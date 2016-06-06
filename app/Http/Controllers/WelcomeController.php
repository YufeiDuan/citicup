<?php namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
//use Image;
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
		return view('welcome');
	}

	public function test()
	{
		//$univ = Univ::all()->toJson();
		//Storage::put('a.txt', $univ);
		return view('blank');
	}

	public function admin()
	{
		return view('admin.login');
	}

	public function news()
	{
		return view('news');
	}

	public function newsinfo(Request $request){
		$num = $request->route('num');
		return view('news.info'.$num);
	}
}
