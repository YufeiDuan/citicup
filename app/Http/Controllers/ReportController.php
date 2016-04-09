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
		View::share('data',['count'=>$count,'name'=>$team->name,'title'=>$team->title,'report'=>$report]);
		if(empty($report)){
			Storage::makeDirectory('reports/'.$team->id);
			$report = new Report;
			$report->freq=Config::first()->freq;
			$report->team_id=$team->id;
		}
		
		if($report->freq==0){
			return '今日提交次数已达上限，请明日再试。';
		}	

		if(Input::hasFile('report'))
		{
			$file = Input::file('report');
			$filename = $file->getClientOriginalName();
			$filesize = $file->getSize();
			if ($filename != "") {
				$type = $file->getClientOriginalExtension();

				//上传路径
				$path =$filename;
				if(!empty($report->path)){
					if (Storage::exists('reports/'.$team->id.'/'.$report->path))
					{
					    Storage::delete('reports/'.$team->id.'/'.$report->path);
					}
				}

				
				$file->move(storage_path().'/app/reports/'.$team->id,$path);

				$report->path=$path;				

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
			'time'=>date("Y-m-d H:i:s"),
			'freq'=>$report->freq
		);

		return Response::json($arr);
		}
	}
	//更新参赛题目
	public function update(Request $request){

		$this->validate($request, [
	        'title' => 'required|string',
    	]);

		$team = Auth::user()->team;
		$old_name = $team->name;
		$count = $team->unreadcount();
		$team->title = Input::get('title');
		if($team->save()){
			View::share('data',['count'=>$count,'name'=>$team->name]);
			return Redirect::to('/report');
		}else{
			View::share('data',['count'=>$count,'name'=>$old_name]);
			return Redirect::to('/repprt')->withErrors('修改失败！');
		}
		
	}

	public function __construct()
    {
        $this->middleware('reportstate');
    }

	
}
