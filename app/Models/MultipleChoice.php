<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MultipleChoice extends Model {
  protected $fillable = [ 'question', 'choices', 'solution' ];
	public function task() {
		return $this->belongsTo('App\Task');
	}

	// Returns shuffled array of choices
	public function randomOrderChoices() {
    $choices = stringToArray($this->choices);
    shuffle($choices);
    return $choices;
	}

	// Returns true if answer is correct, otherwise false
	public function checkSolution($answer) {
    $solutions = stringToArray($this->solution);
    foreach ($solutions as $solution) {
      if(strcmp($solution, $answer) == 0) return True;
    }
    return False;
  }

  public function getSolutionCount() {
    return count(stringToArray($this->solution));
  }

}
