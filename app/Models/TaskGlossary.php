<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskGlossary extends Model
{
    protected $table = 'task_glossaries';
    protected $fillable = [ 'rus', 'fin'];

	public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }

    function get($from,$to)
    {
      $fromarr = preg_split("/(\r\n|\n|\r)/", $this->$from);
      $toarr = preg_split("/(\r\n|\n|\r)/", $this->$to);
      return array_combine($fromarr,$toarr);
    }
}
