<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

		$team = Session::get('team');
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
			Session::put('team',$team);
			return Redirect::to('/admin/team/'.$team->id);
		} else {
			return redirect()->back()->withErrors('添加失败，请稍后重试。')->withInput();
		}

	}	

	public function edit($id){

		$teacher = Teacher::find($id);

		return view('admin.editteacher')->withTeacher($teacher);
	}

	public function update(Request $request,$id){
		$team = Session::get('team');
		$teacher = Teacher::find($id);
		
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
		$teacher->name=Input::get('name');
		$teacher->univ_id=$univ->id;
		$teacher->college=Input::get('college');
		$teacher->email=Input::get('email');

		if ($teacher->save()) {
			Session::put('team',$team);
			return Redirect::to('/admin/team/'.$team->id);
		} else {
			return redirect()->back()->withErrors('修改失败，请稍后重试。')->withInput();
		}
	}

	public function destroy($id)
	{
		$teacher = Teacher::find($id);
		$teacher->delete();
		return Redirect::to('/admin/team/'.Session::get('team')->id);
	}
}
