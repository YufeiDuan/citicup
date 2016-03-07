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
use App\Univ;

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
			'school'=>'required|string',
			'college' => 'required|string|max:20',
			'email' => 'required|email',
		]);

		$univ = Univ::where(['name' => Input::get('school')])->first();
		if(empty($univ)){
			$univ = Univ::create([
				'name' => Input::get('school'),
				'area_id' => 99,
				]);
		}

		$teacher = new Teacher;
		$teacher->name=Input::get('name');
		$teacher->univ_id=$univ->id;
		$teacher->college=Input::get('college');
		$teacher->email=Input::get('email');
		$teacher->team_id=$team->id;
		if ($teacher->save()) {
			return Redirect::to('/team');
		} else {
			return redirect()->back()->withErrors('添加失败，请稍后重试。')->withInput();
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
			'school'=>'required|string',
			'college' => 'required|string|max:20',
			'email' => 'required|email',
		]);

		$univ = Univ::where(['name' => Input::get('school')])->first();
		if(empty($univ)){
			$univ = Univ::create([
				'name' => Input::get('school'),
				'area_id' => 99,
				]);
		}

		if (Teacher::where('id', $id)->update(Input::only(['name','univ_id', 'college','email']))) {
			return Redirect::to('/team');
		} else {
			return redirect()->back()->withErrors('修改失败，请稍后重试。')->withInput();
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
