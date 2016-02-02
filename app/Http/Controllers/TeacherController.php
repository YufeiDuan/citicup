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
use App\Teacher;

class TeacherController extends Controller {

	public function store(){

		$teacher = new Teacher;
		$teacher->name=Input::get('name');
		$teacher->univ_id=Input::get('univ_id');
		$teacher->college=Input::get('college');
		$teacher->email=Input::get('email');
		$teacher->team_id=Auth::user()->team->id;
		if ($teacher->save()) {
			return Redirect::to('/team');
		} else {
			return Redirect::to('/team')->withErrors('添加失败！');
		}

	}	

	public function edit($id){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		return view('teacher.edit')->withTeacher(Teacher::find($id));
	}

	public function update(Request $request,$id){
		
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		
		$this->validate($request, [
			'name' => 'required',
			'univ_id'=>'required',
			'college' => 'required',
			'email' => 'required',
		]);

		if (Teacher::where('id', $id)->update(Input::only(['name','univ_id', 'college','email']))) {
			return Redirect::to('/team');
		} else {
			return Redirect::to('/team')->withErrors('更新失败！');
		}

	}

	public function destroy($id)
	{
		$teacher = Teacher::find($id);
		$teacher->delete();

		return Redirect::to('/team');
	}
	public function __construct()
    {
        $this->middleware('teamstate');
    }
}
