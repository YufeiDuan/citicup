<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

use View;
use Session;
use Storage;
use Input;
use Image;
use Redirect;
use Reponse;
use ZipArchive;

use App\Team;
use App\Report;
use App\Config;
use App\Hzip;

class DocController extends Controller {

	public function index(){
		$teams = Team::where('id','>',1)->get();
		View::share('teams',$teams);
		return view('admin.document');
	}

	public function show($id){
		$team = Team::find($id);
		$path = storage_path().'/app/documents/'.$team->id;
		if(file_exists ($path)){
			$filename = 'document('.$team->id.').zip';
			$zipFileName = storage_path().'/app/'.$filename;

			HZip::zipDir($path, $zipFileName); 

	        return Response::download($zipFileName,$filename);
		}else{
			return Redirect::to('/admin/document')->withErrors('该团队未提交任何作品。'.$path);
		}
	}

	public function dlall(){

		$path = storage_path() . '/app/documents';

        $zipFileName = storage_path().'/app/document.zip';

		HZip::zipDir($path, $zipFileName); 

        return Response::download($zipFileName,'document.zip');
                
	}
	
}
