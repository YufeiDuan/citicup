<?php namespace App\Http\Controllers\Admin;

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
use Response;

use App\Team;
use App\Univ;
use App\Member;
use App\Teacher;


class TeamController extends Controller {

	public function index(){
		$teams = Team::all();
		View::share('teams',$teams);
		return view('admin.team');
	}

	//添加团队
	public function show(){
		
	}

	//更新团队Logo
	public function updatelogo(Request $request){

		$this->validate($request, [
	        'pic' => 'required|mimes:jpeg,bmp,png'
    	]);

		if(Input::hasFile('pic'))
		{
			$file = Input::file('pic');
			$filename = $file->getClientOriginalName();
			$filesize = $file->getSize();
			if ($filename != "") {
				//$type = $file->getClientOriginalExtension();
				$logopath =date("YmdHis").rand(100, 999).".jpg";
				//上传路径
				if(!empty($team->logo)){
					if(Storage::exists('logos/'.$team->logo)){
						Storage::delete('logos/'.$team->logo);						
					}
				}
				
				
				$path = $file->move(storage_path().'/app/logos',$logopath);

				Image::make($path)->resize(200, 200)->save($path);
				$team->logo = $logopath;			

				$team->save();
			}
			$size = round($filesize/1024,2);
			$arr = array(
			'name'=>$filename,
			'size'=>$size,
			'time'=>date("Y-m-d H:i:s"),
		);

		return Response::json($arr);
		}
	}

	//更新团队信息
	public function update(Request $request){
		
		$this->validate($request, [
	        'school' => 'required|string',
	        'team_title' => 'string',
	        'team_name' => 'required|string',
    	]);

		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$old_name = $team->name;

		$univ = Univ::where(['name' => Input::get('school')])->first();
		if(empty($univ)){
			$univ = Univ::create([
				'name' => Input::get('school'),
				'area_id' => 99,
				]);
		}

		$team->univ_id = $univ->id;
		$team->title = Input::get('team_title');
		$team->name = Input::get('team_name');
		

		if($team->save()){
			return Redirect::to('/team');
		}else{
			return Redirect::to('/team')->withErrors('修改失败！');
		}

		
	}
	
}
