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
}
