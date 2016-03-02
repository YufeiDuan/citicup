<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Auth;
use Route;
use Mail;
use App\User;
use App\Validate;
use App\Team;
use Input;
use Storage;
use Image;
use Response;

class RegisterController extends Controller {

	public function register(){
		return view('register');
	}

	//注册
	public function postRegister(Request $request){
		$this->validate($request, [
			'email' => 'required|email|max:255|unique:authens',
			'password' => 'required|confirmed|min:6',
		]);

		$count = User::where('email','=',$request['email'])->count();
		if($count>0){
			return redirect('/register')->withErrors('该邮箱已被注册');
		}else{
			$user = User::create([
			'email' => $request['email'],
			'password' => bcrypt($request['password']),
			'state' => 0,
			]);
			$token = str_random(20);
			while(validate::where('token','=',$token)->count()>0){
				$tag = str_random(20);
			}
			Validate::create([
				'authen_id'=> $user->id,
				'token' =>$token,
			]);
			Auth::login($user);
			Mail::queue('emails.validate', ['token'=>$token], function($message) use($user)
			{
				$message->from('citicup@126.com','CitiCup|XJTU 2016');
			    $message->to($user->email)->subject('[请勿回复]验证您的邮箱');
			});
			return view('regsuccess');
		}

	}
	//注册成功页面
	public function getValidate(){
		return view('regsuccess');
	}
	//重发验证邮件
	public function getResend(){
		$user = Auth::user();
		if(empty($user)){
			return redirect('/')->withErrors('请先登录');
		}
		$validate = $user->validate;
		$curtime = Carbon::now()->subMinutes(2);
		if($curtime>$validate->updated_at){
			//send mail
			$token = str_random(20);
			while(validate::where('token','=',$token)->count()>0){
				$tag = str_random(20);
			}
			$validate->token = $token;
			$validate->save();
			Mail::queue('emails.validate', ['token'=>$token], function($message) use($user)
			{
				$message->from('citicup@126.com','CitiCup|XJTU 2016');
			    $message->to($user->email)->subject('[请勿回复]验证您的邮箱');
			});
			$info='邮件已重新发送。';
		}
		else{
			$info='操作过于频繁，请2分钟后重试。';
		}
		return view('regsuccess')->withInfo($info);
	}
	//url验证
	public function validateemail(){
		$token = Route::input('token');
		$validate = Validate::where('token','=',$token)->first();
		if(empty($validate)){
			$info='链接已失效';
		}else{
			$curtime = Carbon::now()->subDays(1);
			if($curtime>$validate->updated_at){
				$info='链接已失效，请点击重新发送验证邮件';
			}else{
				$user = $validate->user;
				$user->state=2;
				$user->save();
				Auth::login($user);
				return redirect('/reg/team');
			}
		}
		
		return view('regsuccess')->withInfo($info);
	}
	//创建团队页
	public function getTeam(){
		return view('newteam');
	}
	//上传Logo
	public function postLogo(Request $request){
		$this->validate($request, [
	        'pic' => 'required|mimes:jpeg,bmp,png'
    	]);

		$user = Auth::user();
		$team = $user->team;
		if(empty($team)){
			$team = Team::create([
					'authen_id' => $user->id,
				]);
		}

		if(Input::hasFile('pic'))
		{
			$file = Input::file('pic');
			$filename = $file->getClientOriginalName();
			$filesize = $file->getSize();
			if ($filename != "") {
				//$type = $file->getClientOriginalExtension();
				$logopath =date("YmdHis").rand(100, 999).".jpg";
				//上传路径
				//Storage::delete('logos/'.$team->logo);
				
				$path = $file->move(storage_path().'/app/logos',$logopath);

				Image::make($path)->resize(200, 200)->save($path);
				$team->logo = $logopath;			

				$team->save();
			}
			$size = round($filesize/1024,2);
			$arr = array(
			'name'=>$filename,
			'size'=>$size,
			'time'=>date("Y-m-d H:i:s"),
		);

		return Response::json($arr);
		}
	}
	//创建团队
	public function postTeam(Request $request){
		$this->validate($request, [
			'univ_sel' => 'required|numeric',
	        'title' => 'string',
	        'name' => 'required|string',
		]);

		$user = Auth::user();
		$team = $user->team;
		if(empty($team)){
			$team = Team::create([
				'authen_id' => $user->id,
			]);
		}
		$team->univ_id=Input::get('univ_sel');
		$team->name=Input::get('name');
		if(empty(Input::get('title'))){
			$team->title=Input::get('title');
		}
		$team->save();
		$user->state=3;
		$user->save();
		return redirect('/reg/member');
	}

	public function getMember(){
		return view('newmember');
	}

	public function __construct()
    {
        $this->middleware('regstate');
    }

}
