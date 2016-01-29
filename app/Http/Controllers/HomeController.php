<?php namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use App\Team;

use App\Http\Controllers\Controller;

class HomeController extends AuthBaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		Session::put('team',$team);
		Session::put('data',['count'=>$count,'name'=>$team->name]);
		View::share('data',['count'=>$count,'name'=>$team->name]);
		return view('home');
	}

}
