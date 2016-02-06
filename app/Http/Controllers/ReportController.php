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
use App\Config;

class ReportController extends Controller {

	public function index(){

		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$report = $team->report;
		View::share('data',['count'=>$count,'name'=>$team->name,'title'=>$team->title,'report'=>$report]);

		return view('report');
	}

	public function store(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$report = $team->report;
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
				
				$file->move(storage_path().'/app/reports',$path);
				if(empty($report)){
					$report = new Report;
				}
				$report->path=$path;
				$report->team_id=$team->id;
				if(empty($report->freq)){
					$report->freq=Config::first()->freq;
				}
				if($report->freq>0){
					$report->freq-=1;
				}
				$report->save();
			}
			$size = round($filesize/1024,2);
			$arr = array(
			'name'=>$filename,
			'type'=>$type,
			'size'=>$size,
			'time'=>date("YmdHis"),
			'freq'=>$report->freq
		);

		return Response::json($arr);
		}
	}


	public function __construct()
    {
        $this->middleware('reportstate');
    }

	
}
