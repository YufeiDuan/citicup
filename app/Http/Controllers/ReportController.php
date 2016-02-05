<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

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
		View::share('data',['count'=>$count,'name'=>$team->name,'title'=>$team->title]);

		return view('report');
	}

	public function store(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		
		if(Input::hasFile('report'))
		{
			$file = Input::file('report');
			$filename = $file->getClientOriginalName();
			$filesize = $file->getSize();
			if ($filename != "") {
				$type = $file->getClientOriginalExtension();

				//上传路径
				$path =$team->id.$team->name.date("YmdHis").rand(100, 999).".".$type;
				//Storage::delete('reports/'.$team->logo);
				
				$path = $file->move(storage_path().'/app/reports',$path);
			}
			$size = round($filesize/1024,2);
			$arr = array(
			'name'=>$filename,
			'type'=>$type,
			'size'=>$size
		);

		return Response::json($arr);
		}
	}


	public function __construct()
    {
        $this->middleware('reportstate');
    }

	
}
