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
use App\Member;
use App\Teacher;


class TeamController extends Controller {

	public function index(){

		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		$members = $team->members;
		$teachers = $team->teachers;

		return view('team',[
			"team"		=>$team,
			"members"	=>$members,
			"teachers"	=>$teachers,
			"univ"		=>$team->univ,
		]);
	}

	public function add(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$teacher_count = $team->teachers->count();
		View::share('data',['count'=>$count,'name'=>$team->name,'teacher_count'=>$teacher_count]);
		return view('addmember');
	}

	public function update(){
		$team = Auth::user()->team;
		$team->name = Input::get('team_name');
		$team->univ_id = Input::get('univ_sel');
		$team->title = Input::get('team_title');
		$logopath =date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".jpg";
		
		
		if(Input::hasFile('upload'))
		{
			Storage::delete('logos/'.$team->logo);
			$file = Input::file('upload');
			$path = $file->move(storage_path().'/app/logos',$logopath);
	  		Image::make($path)->resize(200, 200)->save($path);
	  		//chmod($path,0666);
			$team->logo = $logopath;

		}
		Session::put('team',$team);
		if($team->save()){
			return Redirect::to('/team');
		}else{
			return Redirect::to('/team')->withErrors('修改失败！');
		}
	}

	
}
