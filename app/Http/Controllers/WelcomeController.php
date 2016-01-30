<?php namespace App\Http\Controllers;

//use Storage;
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
		/*
		$str = 'var schoool_list = ';
		$str.=Area::with('univs')->get()->toJson();
		//$str.=Area::find(11)->univs->toJson();	

		Storage::disk('local')->put('school.js', $str);
		
		// open an image file
		$img = Image::make('img/main.jpg');
		 
		// resize image instance
		$img->resize(320, 240);
		 
		 
		// save image in desired format
		$img->save('bar.jpg');
		*/
		return view('welcome');
	}

}
