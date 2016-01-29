<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthBaseController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

}
