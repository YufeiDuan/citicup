<?php namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use App\Team;
use App\Process;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

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
	public function home()
	{
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		
		$p = Process::all();
		$team = Process::find(1);
		$report = Process::find(2);
		$doc = Process::find(3);
		$curtime = date('Y-m-d H:i:s',time());
		if($curtime>$doc->time){
			return redirect('/rate')->withInfos('正在进行首轮评选...');
		}
		elseif($curtime>$report->time){
			return redirect('/document');
		}
		elseif($curtime>$team->time){
			return redirect('/report');
		}else{
			return redirect('/team');
		}

		return view('home');
	}

	public function rate(){

		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);

		return view('evaluation')->withInfos('正在进行首轮评选...');
	}
}
