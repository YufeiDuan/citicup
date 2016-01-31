<?php namespace App\Http\Controllers;

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
use App\Member;

class MemberController extends Controller {

	public function edit($id){
		View::share('data',Session::get('data'));
		return view('member.edit')->withMember(Member::find($id));
	}

	public function update(Request $request,$id){
		
		View::share('data',Session::get('data'));
		
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

		if (Member::where('id', $id)->update(Input::except(['_method', '_token','sex_sel','degree_sel','entry_sel','school']))) {
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
}
