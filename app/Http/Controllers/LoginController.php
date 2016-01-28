<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

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
        return redirect('/')
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
}
