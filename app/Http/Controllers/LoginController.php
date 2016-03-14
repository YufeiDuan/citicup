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



        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']],$request->has('remember')))
        {
            $user = Auth::user();
            if($user->state==1){
            	return redirect()->intended('home');
            }
            else if($user->state==0){
            	return redirect('/reg/validate');
            }
            else if($user->state==2){
            	return redirect('/reg/team');
            }
        }
        return redirect('/test')
					->withInput($request->only('email', 'remember'))
					->withErrors($this->getFailedLoginMessage($request));
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

}
