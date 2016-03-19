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
use App\Univ;
use App\Member;

class MemberController extends Controller {

	public function edit($id){
		$member = Member::find($id);
		return view('admin.editmember')->withMember($member);
	}

	public function store(Request $request){
		if (Member::where('id_num',Input::get('id_num'))->count()>0) {
			$member = Member::where('id_num',Input::get('id_num'))->first();
			$str = '身份证号冲突，请检查：('.$member->team->id.')'.$member->team->name.' 团队成员 ('.$member->id.')'.$member->name;
			return redirect()->back()->withInput()->withErrors($str);
		}

		$this->validate($request, [
			'name' => 'required|string|max:10',
			'sex' => 'required|boolean',
			'school'=>'required|string',
			'college' => 'required|string|max:20',
			'major' => 'required|string|max:20',
			'id_num' => 'required|string|max:18|unique:members',
			'stu_num' => 'required|string|max:15',
			'degree' => 'required|numeric',
			'year_entry' => 'required|numeric',
			'email' => 'required|email',
			'leader' => 'required|boolean',
		]);

		$univ = Univ::where(['name' => Input::get('school')])->first();
		if(empty($univ)){
			$univ = Univ::create([
				'name' => Input::get('school'),
				'area_id' => 99,
				]);
		}
		$team = Session::get('team');
		$member = new Member;
		$member->name=Input::get('name');
		$member->sex=Input::get('sex');
		$member->univ_id=$univ->id;
		$member->college=Input::get('college');
		$member->major=Input::get('major');
		$member->stu_num=Input::get('stu_num');
		$member->id_num=Input::get('id_num');
		$member->degree=Input::get('degree');
		$member->year_entry=Input::get('year_entry');
		$member->email=Input::get('email');
		$member->team_id = Session::get('team')->id;
		$member->leader=Input::get('leader');
		if ($member->save()) {
			return Redirect::to('/admin/team/'.$team->id);
		} else {
			return redirect()->back()->withErrors('添加失败，请稍后重试。')->withInput();
		}

	}
	public function update(Request $request,$id){
		$member = Member::find($id);

		if (Member::where('id_num',Input::get('id_num'))->count()>0) {
			$member = Member::where('id_num',Input::get('id_num'))->first();
			$str = '身份证号冲突，请检查：('.$member->team->id.')'.$member->team->name.' 团队成员 ('.$member->id.')'.$member->name;
			return redirect()->back()->withInput()->withErrors($str);
		}
		
		$this->validate($request, [
			'name' => 'required|string|max:10',
			'sex' => 'required|boolean',
			'school'=>'required|string',
			'college' => 'required|string|max:20',
			'major' => 'required|string|max:20',
			'id_num' => 'required|string|max:18',
			'stu_num' => 'required|string|max:15',
			'degree' => 'required|numeric',
			'year_entry' => 'required|numeric',
			'email' => 'required|email',
		]);

		$univ = Univ::where(['name' => Input::get('school')])->first();
		if(empty($univ)){
			$univ = Univ::create([
				'name' => Input::get('school'),
				'area_id' => 99,
				]);
		}
		$member->name=Input::get('name');
		$member->sex=Input::get('sex');
		$member->univ_id=$univ->id;
		$member->college=Input::get('college');
		$member->major=Input::get('major');
		$member->stu_num=Input::get('stu_num');
		$member->id_num=Input::get('id_num');
		$member->degree=Input::get('degree');
		$member->year_entry=Input::get('year_entry');
		$member->email=Input::get('email');
		if ($member->save()) {
			return Redirect::to('/team');
		} else {
			return redirect()->back()->withErrors('修改失败，请稍后重试。')->withInput();
		}

	}

	public function destroy($id)
	{
		$team = Auth::user()->team;
		$member = Member::find($id);

		if($member->leader){
			return redirect('/team')->withErrors('队长不可删除。');
		}
		if($member->team_id!=$team->id){
			return redirect('/team')->withErrors('只能修改自己团队成员信息。');
		}
		$member->delete();

		return Redirect::to('/team');
	}

}
