<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller {

	public function news()
	{
		return view('news');
	}

	public function newsinfo(Request $request){
		$num = $request->route('num');
		return view('news.info'.$num);
	}
}
