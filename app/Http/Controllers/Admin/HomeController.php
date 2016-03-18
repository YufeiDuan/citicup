<?php namespace App\Http\Controllers\Admin;

use View;
use Session;
use App\Team;
use App\Process;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

	public function home()
	{
		return view('admin.home');
	}

}
