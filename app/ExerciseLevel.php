<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseLevel extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exercise_levels';
    protected $fillable = [ 'name' ];
	
	public function exercises()
    {
        return $this->hasMany('App\Exercise');
    }
}
