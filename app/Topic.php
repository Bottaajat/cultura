<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'topics';
    protected $fillable = [ 'name' ];
	
	public function exercises()
    {
        return $this->hasMany('App\Exercise');
    }
}
