<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Univ;

class Area extends Model {

	//
	public $timestamps = false;

	public function univs(){
		return $this->hasMany('App\Univ');
	}

	public function name(){
		return $this->name;
	}
}
