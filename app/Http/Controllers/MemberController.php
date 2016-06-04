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
use App\Univ;
use App\Member;

class MemberController extends Controller {

	public function edit($id){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$member = Member::find($id);

		if($member->leader){
			return redirect('/team')->withErrors('队长信息暂不可修改。');
		}
		if($member->team_id!=$team->id){
			return redirect('/team')->withErrors('只能修改自己团队成员信息。');
		}

		View::share('data',['count'=>$count,'name'=>$team->name]);
		return view('member.edit')->withMember($member);
	}

	public function store(Request $request){
		if (Member::where('id_num',Input::get('id_num'))->count()>0) {
			return redirect()->back()->withInput()->withErrors('身份证号已被注册，若有疑问，请联系主办方。');
		}
		$idcard = Input::get('id_num');
		$flag=1;
		if(strlen($idcard)!=18){  
	        $flag=0;
	    }  
	    $idcard_base = substr($idcard, 0, 17);  
	    $verify_code = substr($idcard, 17, 1);  
	    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);  
	    $verify_code_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');  
	    $total = 0;  
	    for($i=0; $i<17; $i++){  
	        $total += substr($idcard_base, $i, 1)*$factor[$i];  
	    }  
	    $mod = $total % 11;  
	    if($verify_code == $verify_code_list[$mod]){  
	        $flag=1;
	    }else{  
	        $flag=0;
	    }
	    if($flag==0){
	    	return redirect()->back()->withInput()->withErrors('身份证号有误，若有疑问，请联系主办方。');
	    }

		$this->validate($request, [
			'name' => 'required|string|max:10',
			'sex' => 'required|boolean',
			'school'=>'required|string',
			'id_num' => 'required|string|max:18|unique:members',
			'college' => 'required|string|max:20',
			'degree' => 'required|numeric',
			'grade' => 'required|numeric',
			'phone' => 'required|string|size:11',
			'email' => 'required|email',
		]);

		$univ = Univ::where(['name' => Input::get('school')])->first();
		if(empty($univ)){
			$univ = Univ::create([
				'name' => Input::get('school'),
				'area_id' => 99,
				]);
		}

		$member = new Member;
		$member->name=Input::get('name');
		$member->sex=Input::get('sex');
		$member->univ_id=$univ->id;
		$member->college=Input::get('college');
		$member->phone=Input::get('phone');
		$member->id_num=Input::get('id_num');
		$member->degree=Input::get('degree');
		$member->grade=Input::get('grade');
		$member->email=Input::get('email');
		$member->team_id=Auth::user()->team->id;
		$member->leader=0;
		if ($member->save()) {
			return Redirect::to('/team');
		} else {
			return redirect()->back()->withErrors('添加失败，请稍后重试。')->withInput();
		}

	}

	public function update(Request $request,$id){
		$member = Member::find($id);
		$team = Auth::user()->team;
		if($member->leader){
			return redirect('/team')->withErrors('队长信息暂不可修改。');
		}
		if($member->team_id!=$team->id){
			return redirect('/team')->withErrors('只能修改自己团队成员信息。');
		}
		if (Member::where('id_num',Input::get('id_num'))->count()>0) {
			$membertemp = Member::where('id_num',Input::get('id_num'))->first();
			if($membertemp->id != $member->id)
			return redirect()->back()->withInput()->withErrors('身份证号已被注册，若有疑问，请联系主办方。');
		}
		$idcard = Input::get('id_num');
		$flag=1;
		if(strlen($idcard)!=18){  
	        $flag=0;
	    }  
	    $idcard_base = substr($idcard, 0, 17);  
	    $verify_code = substr($idcard, 17, 1);  
	    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);  
	    $verify_code_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');  
	    $total = 0;  
	    for($i=0; $i<17; $i++){  
	        $total += substr($idcard_base, $i, 1)*$factor[$i];  
	    }  
	    $mod = $total % 11;  
	    if($verify_code == $verify_code_list[$mod]){  
	        $flag=1;
	    }else{  
	        $flag=0;
	    }
	    if($flag==0){
	    	return redirect()->back()->withInput()->withErrors('身份证号有误，若有疑问，请联系主办方。');
	    }

		$team = Auth::user()->team;
		$count = $team->unreadcount();
		View::share('data',['count'=>$count,'name'=>$team->name]);
		
		$this->validate($request, [
			'name' => 'required|string|max:10',
			'sex' => 'required|boolean',
			'id_num' => 'required|string|max:18',
			'school'=>'required|string',
			'college' => 'required|string|max:20',
			'degree' => 'required|numeric',
			'grade' => 'required|numeric',
			'phone' => 'required|string|size:11',
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
		$member->phone=Input::get('phone');
		$member->id_num=Input::get('id_num');
		$member->degree=Input::get('degree');
		$member->grade=Input::get('grade');
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
	

	public function __construct()
    {
        $this->middleware('teamstate');
    }
}
