<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use Mail;
use Carbon\Carbon;
use Input;
use Route;
use App\Team;
use App\User;
use App\Validate;

use App\Http\Controllers\Controller;

class PasswordController extends Controller {
	//申请重置密码
	public function getApply()
	{
		return view('pwdapply');
	}
	//验证，发送邮件
	public function postApply(Request $request){
		$this->validate($request, [
	        'email' => 'required|email|max:255',
    	]);

		$email = Input::get('email');
		$user = User::where('email','=',$email)->first();
		if(empty($user)){
			return redirect()->back()->withErrors("邮箱不存在。");
		}
		$validate = $user->validate;
		$token = str_random(20);
		while(validate::where('token','=',$token)->count()>0){
			$token = str_random(20);
		}
		if(empty($validate)){
			$validate=Validate::create([
				'authen_id'=> $user->id,
				'token' =>$token,
			]);
		}else{
			$curtime = Carbon::now()->subMinutes(2);
			if($curtime>$validate->updated_at){
				$validate->token=$token;
				$validate->save();
			}else{
				return view('info')->withErrors('操作过于频繁，请两分钟后重试。');
			}
			
		}

		Mail::queue('emails.password', ['token'=>$token], function($message) use($user)
		{
			$message->from('citicup@xjtu.edu.cn','CitiCup|XJTU 2016');
		    $message->to($user->email)->subject('[请勿回复]重置密码');
		});

		return view('info')->withErrors('发送邮件成功，请查看邮件并重置密码。若未收到邮件，请两分钟后重试。');
	}
	//重置密码链接验证
	public function reset(){
		$token = Route::input('token');
		$validate = Validate::where('token','=',$token)->first();
		if(empty($validate)){
			$info='链接已失效';
		}else{
			$curtime = Carbon::now()->subMinutes(30);
			if($curtime>$validate->updated_at){
				$info='链接已失效，请重新操作。';
			}else{
				Auth::loginUsingId($validate->authen_id);
				return view('reset');
			}
		}
		return view('info')->withErrors($info);
	}
	//重置密码
	public function postReset(Request $request){
		$this->validate($request, [
			'password' => 'required|confirmed|min:6|max:16',
		]);
		$user = Auth::user();
		$user->password = bcrypt($request['password']);
		$user->save();
		$validate = Validate::where('authen_id','=',$user->id)->get();
		foreach ($validate as $v){
			$v->delete();
		}
		Auth::logout();
		return redirect('/')->withErrors('密码重置成功，请重新登录');
	}
}
