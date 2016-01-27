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
    }

    public function getLogout()
	{
		Auth::logout();

		return redirect('/');
	}

}
