<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

use App\Extensions\Facades\DlResponse;

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

class ReportController extends Controller {

	public function index(){
		$teams = Team::where('id','>',1)->get();
		View::share('teams',$teams);
		return view('admin.report');
	}

	public function show($id){
		$team = Team::find($id);
		$report = $team->report;
		if(empty($report)){
			return Redirect::to('/admin/report');
		}else{
			$filepath = storage_path().'/app/reports/'.$team->id.'/'.$report->path;
		}
		return DlResponse::download($filepath,$report->path);
	}

	public function dlall(){
		if (Storage::exists('reports.zip'))
		{
		    Storage::delete('reports.zip');
		}

		$path = storage_path() . '/app/reports';

        $zipFileName = storage_path().'/app/reports.zip';

		HZip::zipDir($path, $zipFileName);

        return Response::download($zipFileName,'reports.zip');
                
	}
	
}
