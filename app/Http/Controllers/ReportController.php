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
		View::share('data',['count'=>$count,'name'=>$team->name,
			'title'=>$team->title,
			'introduction_eng'=>$team->introduction_eng,
			'introduction_chn'=>$team->introduction_chn,
			'report'=>$report]);
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
	//更新参赛题目/项目简介
	public function update(Request $request,$id){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		if($id == 1){
			$this->validate($request, [
		        'title' => 'required|string',
	    	]);
			$team->title = Input::get('title');
			if($team->save()){
				return Redirect::to('/report');
			}else{
				return Redirect::to('/report')->withErrors('修改失败！');
			}
		}
		else if($id == 2){
			$this->validate($request, [
		        'introduction_chn' => 'required|string|max:200',
		        'introduction_eng' => 'required|string',
	    	]);
	    	$text = Input::get('introduction_eng');

		    if(count(explode(' ', $text)) > 200){
		        return redirect()->back()->withInput()->withErrors('英文词数过多！');
			}else{
				$team->introduction_eng = $text;
				$team->introduction_chn = $request->input('introduction_chn');
				if($team->save()){
		    		return redirect()->back();
				}else{
					return Redirect::to('/report')->withErrors('修改失败！');
				}
			}
		}
		return redirect()->back();
	}

	public function __construct()
    {
        $this->middleware('reportstate');
    }

	
}
