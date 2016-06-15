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

    public function tasks()
    {
        return $this->hasOne('App\Models\Task');
    }
    
    public function school() {
      return $this->belongsTo('App\Models\School');
    }
    
    public function videoInfo() {
        $gkey = "AIzaSyD-ZRX6dALy1skvyKteKEdxZ1624Q1ASiw";
        
        try {
          $dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&id=".$this->emb_src."&key=".$gkey."");
          $data = json_decode($dur, true);
        
        return $data['items'][0]['snippet'];
        } catch (Exception $e) {
          return error;
        }
    }
}
