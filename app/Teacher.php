<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

	//
	public $timestamps = false;

	public function univ(){
		return $this->belongsTo('App\Univ');
	}
}
