<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Session;
use Auth;

class LogoController extends Controller {

	public function index(){

		$filepath = storage_path().'/app/logos/'.Auth::user()->team->logo;
		return Response::download($filepath,'logo.jpg');
	}


}
