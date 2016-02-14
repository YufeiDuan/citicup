<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Type;

class Document extends Model {

	//

	protected $fillable = ['path', 'team_id', 'type_id','freq'];

	public function type(){
		return $this->belongsTo('App\Type');
	}
}
