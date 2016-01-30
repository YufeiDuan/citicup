<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use View;
use Session;

use App\Team;
use App\Member;
use App\Teacher;


class TeamController extends Controller {

	public function show(){

		View::share('data',Session::get('data'));

		$team = Session::get('team');
		$members = $team->members;
		$teachers = $team->teachers;
		$teacher_count = $teachers->count();
		$univ = $team->univ;

		return view('team',["team"=>$team,"members"=>$members,"teachers"=>$teachers,"univ"=>$univ]);
	}
}
