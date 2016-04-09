<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

use Auth;
use View;
use Session;
use Storage;
use Input;
use Image;
use Redirect;

use App\Team;
use App\Document;
use App\Config;

class DocController extends Controller {

	public function index(){

		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$documents = $team->documents;
		$types = ('1 23');
		/*
		foreach($documents as $doc){
			if(!array_key_exists($doc->type_id,$types))
				$types[]=$doc->type;
		}
		*/
		View::share('data',['count'=>$count,'name'=>$team->name]);
		View::share('documents',$documents);
		View::share('types',"<script> var types=\"$types\";</script>");
		return view('document');
	}

	public function store(){
		$team = Auth::user()->team;
		$count = $team->unreadcount();
		$documents = $team->documents;
		View::share('data',['count'=>$count,'name'=>$team->name]);
		View::share('documents',$documents);

		if(count($documents)==0){
			Storage::makeDirectory('documents/'.$team->id);
		}
		if(Input::hasFile('document'))
		{
			$upload_type = Input::get('upload_type');
			$document = Document::firstOrNew(['team_id' => $team->id,'type_id'=>$upload_type]);

			$file = Input::file('document');
			
			$filename = $file->getClientOriginalName();
			$filesize = $file->getSize();
			if ($filename != "") {
				$type = $file->getClientOriginalExtension();

				//上传路径
				$path =$upload_type.$filename;
				//
				if(!empty($document->path)){
					if($document->freq==0){
						return '今日提交次数已达上限，请明日再试。';
					}
					if (Storage::exists('documents/'.$team->id.'/'.$document->path))
					{
					    Storage::delete('documents/'.$team->id.'/'.$document->path);
					}
				}
				else{
					$document->freq=-1;
				}
				$file->move(storage_path().'/app/documents/'.$team->id,$path);

				$document->path=$path;			

				if($document->freq>0){
					$document->freq-=1;
				}
				$document->save();
			}
			$size = round($filesize/1024,2);
			$arr = array(
			'name'=>$filename,
			'type'=>$type,
			'size'=>$size,
			'time'=>date("Y-m-d H:i:s"),
			'freq'=>$document->freq
		);

		return Response::json($arr);
		}
	}

	public function destroy($id)
	{
		$doc = Document::find($id);
		Storage::delete('documents/'.Auth::user()->team->id.'/'.$doc->path);
		$doc->delete();

		return Redirect::to('/document');
	}

	public function __construct()
    {
        $this->middleware('docstate');
    }

	
}
