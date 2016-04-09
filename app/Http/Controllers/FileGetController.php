<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Session;
use Auth;

class FileGetController extends Controller {

	public function logo(){

		$team = Auth::user()->team;

		if(empty($team->logo)){
			$filepath = storage_path().'/app/logos/logo.png';
		}else{
			$filepath = storage_path().'/app/logos/'.$team->logo;
		}
		
		return Response::download($filepath,'logo.jpg');
	}

	public function template(){
		$template_folder = storage_path().'/app/';
		$filename = 'template.zip';
		return Response::download($template_folder.$filename,$filename);
	}
}
