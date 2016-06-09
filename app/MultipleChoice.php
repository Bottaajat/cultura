<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class MultipleChoice extends Model {

  protected $fillable = [ 'question', 'choices', 'solution' ];

	public function task()
	{
		return $this->belongsTo('App\Task');
	}	
	
	public function randomOrderChoices() {
    $choices = stringToArray($this->choices);
    shuffle($choices);
    return $choices;
	}
}