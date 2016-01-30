<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use View;
use Session;
use Input;
use Image;
use Redirect;

use App\Team;
use App\Member;
use App\Teacher;


class TeamController extends Controller {

	public function index(){

		View::share('data',Session::get('data'));

		$team = Session::get('team');
		$members = $team->members;
		$teachers = $team->teachers;

		return view('team',[
			"team"		=>$team,
			"members"	=>$members,
			"teachers"	=>$teachers,
			"univ"		=>$team->univ,
			"teacher_count"=>$teachers->count(),
		]);
	}

	public function update(){
		$team = Session::get('team');	

		$team->name = Input::get('team_name');
		$team->univ_id = Input::get('univ_sel');
		$team->title = Input::get('team_title');
		$logopath =date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".jpg";
		
		
		try
		{
			$file = Input::file('upload');
			$path = $file->move(storage_path().'/app/logos',$logopath);

	  		Image::make($path)->resize(200, 200)->save($path);

			$team->logo = $logopath;
		}
		catch (Exception $e) {
			
		}

		$team->save();
		
		return Redirect::to('/team');

	}
}
