<?php namespace App\Http\Controllers;

use Storage;
use App\Area;
use App\Univ;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		$str = 'var schoool_list = ';
		$str.=Area::with('univs')->get()->toJson();
		//$str.=Area::find(11)->univs->toJson();	

		Storage::disk('local')->put('school.js', $str);
		*/
		return view('welcome');
	}

}
