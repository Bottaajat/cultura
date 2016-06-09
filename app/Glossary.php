<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{
    protected $table = 'glossaries';
    protected $fillable = [ 'rus', 'fin'];

	public function material()
    {
        return $this->belongsTo('App\Material');
    }
	
	public function task()
    {
        return $this->belongsTo('App\Task');
    }
    
    function get($from,$to)
    {
      $fromarr = preg_split("/(\r\n|\n|\r)/", $this->$from);
      $toarr = preg_split("/(\r\n|\n|\r)/", $this->$to);
      return array_combine($fromarr,$toarr);
    }
}
