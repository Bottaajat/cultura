<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'name' ];
	
	public function exercise()
	{
		return $this->belongsTo('App\Exercise');
	}
}
