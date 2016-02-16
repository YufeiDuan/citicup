<?php namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use App\Team;

use App\Http\Controllers\Controller;

class MailController extends Controller {

	public function index()
	{
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$inbox = $team->inbox;
		View::share('data',['count'=>$count,'name'=>$team->name]);
		View::share('inbox',$inbox);
		return view('inbox');
	}

}
