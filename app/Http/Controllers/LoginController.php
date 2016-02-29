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

class LoginController extends Controller {

	public function postLogin(Request $request)
    {
    	$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);



        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'],'state' => 1],$request->has('remember')))
        {
            return redirect()->intended('home');
        }
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'],'state' => 0],$request->has('remember')))
        {
            return redirect('/auth/validate');
        }
        return redirect('/test')
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage($request),
					]);
    }

    protected function getFailedLoginMessage(Request $request)
	{
		if (Auth::validate(['email' => $request['email'], 'password' => $request['password']]))
		{
		    return '帐号状态异常';
		}
		else{
			return '邮箱与密码不匹配';
		}
		
	}

    public function getLogout()
	{
		Auth::logout();
		return redirect('/');
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
			return redirect('/test')->withErrors('请先登录');
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
			$info='无效链接';
		}else{
			$curtime = Carbon::now()->subDays(1);
			if($curtime>$validate->updated_at){
				$info='链接已过期，请点击重新发送验证邮件';
			}else{
				$info='验证中';
			}
		}
		
		return view('regsuccess')->withInfo($info);
	}
}
