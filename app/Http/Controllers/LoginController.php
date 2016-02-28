<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
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

	public function getValidate(){
		return view('regsuccess');
	}
}
