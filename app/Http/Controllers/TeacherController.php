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

	//teacher add
	public function store(Request $request){

		$team = Auth::user()->team;
		$teacher_count = $team->teachers->count();
		if($teacher_count >1){
			return Redirect::to('/team')->withErrors('指导老师人数已达上限。');
		}
		$this->validate($request, [
			'name' => 'required|string|max:10',
			'univ_id'=>'required|numeric',
			'college' => 'required|string|max:20',
			'email' => 'required|email',
		]);

		$teacher = new Teacher;
		$teacher->name=Input::get('name');
		$teacher->univ_id=Input::get('univ_id');
		$teacher->college=Input::get('college');
		$teacher->email=Input::get('email');
		$teacher->team_id=$team->id;
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

		$teacher = Teacher::find($id);
		if($teacher->team_id!=$team->id){
			return redirect('/team')->withErrors('只能修改自己团队老师信息。');
		}

		return view('teacher.edit')->withTeacher($teacher);
	}

	public function update(Request $request,$id){
		
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		
		$this->validate($request, [
			'name' => 'required|string|max:10',
			'univ_id'=>'required|numeric',
			'college' => 'required|string|max:20',
			'email' => 'required|email',
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
