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
use App\Member;
use App\Teacher;
use App\Univ;
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
			'password' => 'required|confirmed|min:6|max:16',
		]);

		$count = User::where('email','=',$request['email'])->count();
		if($count>0){
			return redirect()->back()->withErrors('该邮箱已被注册')->withInput();
		}else{
			$user = User::create([
			'email' => $request['email'],
			'password' => bcrypt($request['password']),
			'state' => 0,
			]);
			$token = str_random(20);
			while(validate::where('token','=',$token)->count()>0){
				$token = str_random(20);
			}
			Validate::create([
				'authen_id'=> $user->id,
				'token' =>$token,
			]);
			Auth::login($user);
			Mail::queue('emails.validate', ['token'=>$token], function($message) use($user)
			{
				$message->from('citicup@xjtu.edu.cn','CitiCup|XJTU 2016');
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
				$token = str_random(20);
			}
			$validate->token = $token;
			$validate->save();
			Mail::queue('emails.validate', ['token'=>$token], function($message) use($user)
			{
				$message->from('citicup@xjtu.edu.cn','CitiCup|XJTU 2016');
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
				$validate->delete();
				Auth::login($user);
				return redirect('/reg/team');
			}
		}
		return view('regsuccess')->withInfo($info);
	}
	//创建团队页
	public function getTeam(){
		$user = Auth::user();
		if(empty($user)){
			return redirect('/')->withErrors('请先登录');
		}
		return view('newteam');
	}
	//上传Logo
	public function postLogo(Request $request){
		$user = Auth::user();
		if(empty($user)){
			return redirect('/')->withErrors('请先登录');
		}
		$this->validate($request, [
	        'pic' => 'required|mimes:jpeg,bmp,png'
    	]);

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
		$user = Auth::user();
		if(empty($user)){
			return redirect('/')->withErrors('请先登录');
		}
		$this->validate($request, [
			'univ' => 'required|string',
	        'title' => 'string',
	        'name' => 'required|string',
	        'province' => 'required|string',
	        'city' => 'required|string',
	        'area' => 'required|string',
	        'detail_addr' => 'required|string',
		]);


		$univ = Univ::where(['name' => Input::get('univ')])->first();
		if(empty($univ)){
			$univ = Univ::create([
				'name' => Input::get('univ'),
				'area_id' => 99,
				]);
		}

		$team = $user->team;

		if(!($team)){
			$team = Team::create([
				'authen_id' => $user->id,
				'univ_id' => $univ->id,
			]);
		}
		
		$team->name=Input::get('name');
		$team->title=Input::get('title');
		$team->addr = Input::get('province');
		$team->save();
		$user->state=3;
		$user->save();
		return redirect('/reg/member');
	}
	//添加成员页
	public function getMember(){
		$user = Auth::user();
		if(empty($user)){
			return redirect('/')->withErrors('请先登录');
		}
		return view('newmember');
	}


	public function postMember(Request $request){
		$user = Auth::user();
		if (empty($user)){
			return redirect('/')->withErrors('请先登录');
		}
		if (Member::where('id_num',Input::get('id_num'))->count()>0) {
			return redirect()->back()->withErrors('身份证号已被注册，若有疑问，请联系主办方。')->withInput();
		}
		$idcard = Input::get('id_num');
		$flag=1;
		if(strlen($idcard)!=18){  
	        $flag=0;
	    }  
	    $idcard_base = substr($idcard, 0, 17);  
	    $verify_code = substr($idcard, 17, 1);  
	    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);  
	    $verify_code_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');  
	    $total = 0;  
	    for($i=0; $i<17; $i++){  
	        $total += substr($idcard_base, $i, 1)*$factor[$i];  
	    }  
	    $mod = $total % 11;  
	    if($verify_code == $verify_code_list[$mod]){  
	        $flag=1;
	    }else{  
	        $flag=0;
	    }
	    if($flag==0){
	    	return redirect()->back()->withInput()->withErrors('身份证号有误，若有疑问，请联系主办方。');
	    }

		$this->validate($request, [
			'leader_name' => 'required|string|max:10',
			'leader_sex' => 'required|boolean',
			'leader_univ'=>'required|string',
			'leader_college' => 'required|string|max:20',
			'phone' => 'required|string|size:11',
			'id_num' => 'required|string|max:18|unique:members',
			'degree' => 'required|numeric',
			'grade' => 'required|numeric',
			'leader_email' => 'required|email',

			'teacher_name' => 'required|string|max:10',
			'teacher_univ'=>'required|string',
			'teacher_college' => 'required|string|max:20',
			'teacher_email' => 'required|email',
		]);

		$l_univ = Univ::where(['name' => Input::get('leader_univ')])->first();
		if(empty($l_univ)){
			$l_univ = Univ::create([
				'name' => Input::get('leader_univ'),
				'area_id' => 99,
				]);
		}

		$t_univ = Univ::where(['name' => Input::get('teacher_univ')])->first();
		if(empty($t_univ)){
			$t_univ = Univ::create([
				'name' => Input::get('teacher_univ'),
				'area_id' => 99,
				]);
		}

		$user = Auth::user();
		$member = new Member;
		$member->name=Input::get('leader_name');
		$member->sex=Input::get('leader_sex');
		$member->univ_id=$l_univ->id;
		$member->college=Input::get('leader_college');
		$member->phone=Input::get('phone');
		$member->id_num=Input::get('id_num');
		$member->degree=Input::get('degree');
		$member->grade=Input::get('grade');
		$member->email=Input::get('leader_email');
		$member->team_id=$user->team->id;
		$member->leader=1;
		$member->save();

		$teacher = new Teacher;
		$teacher->name=Input::get('teacher_name');
		$teacher->univ_id=$t_univ->id;
		$teacher->college=Input::get('teacher_college');
		$teacher->email=Input::get('teacher_email');
		$teacher->team_id=$user->team->id;
		$teacher->save();

		$user->state=1;
		$user->save();
		return redirect('/home');
	}


	public function __construct()
    {
        $this->middleware('regstate');
    }

}
