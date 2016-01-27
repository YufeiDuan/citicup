<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class LoginController extends Controller {

	public function postLogin(Request $request)
    {
    	$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);



        if ($this->auth->attempt(['email' => $request['email'], 'password' => $request['password'],'state' => 1],$request->has('remember')))
        {
            return redirect()->intended('home');
        }
    }

    public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}


	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		//$this->middleware('guest', ['except' => 'getLogout']);
	}
}
