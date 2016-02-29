<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Validate extends Model {

	
	protected $fillable = ['authen_id', 'token'];

	public function user(){
		return $this->belongsTo('App\User','authen_id');
	}
}
