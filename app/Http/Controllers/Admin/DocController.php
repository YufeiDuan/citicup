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
		$report = $team->report;
		if(empty($report)){
			return Redirect::to('/admin/report');
		}else{
			$filepath = storage_path().'/app/reports/'.$team->id.'/'.$report->path;
		}
		return Response::download($filepath,$report->path);
	}

	public function dlall(){

		$path = storage_path() . '/app/reports';

        $zipFileName = storage_path().'/app/report.zip';

		HZip::zipDir($path, $zipFileName); 

        return Response::download($zipFileName,'reports.zip');
                
	}
	
}
