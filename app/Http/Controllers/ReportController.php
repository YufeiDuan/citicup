<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use View;
use Session;
use Storage;
use Input;
use Image;
use Redirect;

use App\Team;
use App\Report;


class ReportController extends Controller {

	public function index(){

		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);

		return view('report');
	}

	public function store(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		if(Input::hasFile('fileToUpload'))
		{
			$path =$team->id.$team->name.date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".jpg";
			//Storage::delete('reports/'.$team->logo);
			$file = Input::file('fileToUpload');
			$path = $file->move(storage_path().'/app/reports',$path);
			return view('report')->withErrors('222');
		}

		return view('report')->withErrors('111');
	}


	public function __construct()
    {
        $this->middleware('reportstate');
    }

	
}
