<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Route;
use App\Admin;

class AuthController extends Controller {



	public function postLogin(Request $request)
    {
    	$this->validate($request, [
			'name' => 'required', 'password' => 'required',
		]);
    	$admin = Admin::where(['name'=>$request['name']])->first();
        if(empty($admin)){
			return redirect()->back()->withErrors("用户名或密码错误")->withInput($request->only('name'));
        }else{
        	$ret = password_verify($request['password'],$admin->password);
        	if($ret==1){
        		if($admin->state==1){
			        Session::put('admin', $admin);
			        //return redirect('/admin');
			        return redirect()->back()->withErrors($ret);
        		}
        	}
        }
		return redirect()->back()->withErrors("用户名或密码错误")->withInput($request->only('name'));


    }

    public function getLogout()
	{
		Session::flush();
		return redirect('/');
	}

}
