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

class MemberController extends Controller {

	public function edit($id){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		return view('member.edit')->withMember(Member::find($id));
	}

	public function store(){
		if (Member::where('id_num',Input::get('id_num'))->count()>0) {
			return Redirect::to('/team')->withErrors('身份证号已被注册，若有疑问，请联系主办方。');
		}
		$member = new Member;
		$member->name=Input::get('name');
		$member->sex=Input::get('sex');
		$member->univ_id=Input::get('univ_id');
		$member->college=Input::get('college');
		$member->major=Input::get('major');
		$member->stu_num=Input::get('stu_num');
		$member->id_num=Input::get('id_num');
		$member->degree=Input::get('degree');
		$member->year_entry=Input::get('year_entry');
		$member->email=Input::get('email');
		$member->team_id=Auth::user()->team->id;
		$member->leader=0;
		if ($member->save()) {
			return Redirect::to('/team');
		} else {
			return Redirect::to('/team')->withErrors('添加失败！');
		}

	}

	public function update(Request $request,$id){
		
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		
		$this->validate($request, [
			'name' => 'required',
			'sex' => 'required',
			'univ_id'=>'required',
			'college' => 'required',
			'major' => 'required',
			'id_num' => 'required',
			'stu_num' => 'required',
			'degree' => 'required',
			'year_entry' => 'required',
			'email' => 'required',
		]);

		if (Member::where('id', $id)->update(Input::only(['name', 'sex','univ_id','college','major','id_num','stu_num','degree','year_entry','email']))) {
			return Redirect::to('/team');
		} else {
			return Redirect::to('/team')->withErrors('更新失败！');
		}

	}

	public function destroy($id)
	{
		$member = Member::find($id);
		$member->delete();

		return Redirect::to('/team');
	}
	public function __construct()
    {
        $this->middleware('teamstate');
    }
}
