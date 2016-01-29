<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Session;

class LogoController extends Controller {

	public function getPic(){

		$filepath = storage_path().'/app/logos/'.Session::get('team')->logo;
		return Response::download($filepath,'logo.jpg');
	}


}
