<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos';
    protected $fillable = [ 'title','emb_src','desc','thumb' ];

    public function task()
    {
      return $this->hasOne('App\Models\Task');
    }
    
    public function school() {
      return $this->belongsTo('App\Models\School');
    }
}
