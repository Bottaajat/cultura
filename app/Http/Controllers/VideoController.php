<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Video;
use App\Models\User;
use App\Models\School;

use Auth, Hash;

class VideoController extends Controller
{
  private $gkey = "PUT YOUR KEY HERE";

  public function __construct() {
    $this->middleware('auth', ['except' => ['index','show']]);
  }

  public function index() {
    $videos = Video::all();
    return view('video.index', array('videos' => $videos));
  }
  
  public function show($id) {
    $video = Video::find($id);
    return view('video.show', ['video' => $video]);
  }
  
  public function store(Request $request) {
    $vid = $this->getVideoId($request->input('src'));
    if ($vid != NULL) {
      $video = new Video();
      $video->emb_src = $vid;
      $videoinfo = $this->videoInfo($vid);
      $video->desc = $this->getDesc($request, $videoinfo);
      $video->title = $this->getTitle($request, $videoinfo);
      $video->thumb = $this->storeThumbnail($video,$videoinfo);
      $video->school()->associate(Auth::user()->school);
      $video->save();
      return back()->with('success', 'Video luotu!');
    } else {
      return back()->withErrors('Virheellinen linkki!');
    }
  }

  public function update(Request $request, $id) {
      $video = Video::find($id);
      $newvid = $this->getVideoId($request->input('src'));
      $vid = (strlen($newvid) == 0) ? $video->emb_src : $newvid;
      $videoinfo = $this->videoInfo($vid);
      $video->emb_src = $vid;
      $video->desc = $this->getDesc($request, $videoinfo);
      $video->title = $this->getTitle($request, $videoinfo);
      $video->thumb = $this->storeThumbnail($video,$videoinfo);
      $video->school()->associate(Auth::user()->school);
      $video->save();
      return back()->with('success', 'Videon tiedot päivitetty!');
  }

  public function destroy($id) {
    $video = Video::find($id);
    $this->deleteThumbIfLast($video);
    $video->delete();
    return back()->with('success', 'Video poistettu!');
  }
  
  // Private functions ...
  
  private function getVideoId($src) {
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $src, $match)) {
      return $match[1];
    } else {
      return NULL;
    }
  }
  
  private function videoInfo($vid) {
      try {
        $dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&id=".$vid."&key=".$this->gkey."");
        $data = json_decode($dur, true);
        return $data['items'][0]['snippet'];
      } catch (Exception $e) {
        return NULL;
      }
  }
  
  private function getTitle($request, $videoinfo) {
    if ($request->input('title'))
      return $request->input('title');
    else if ($videoinfo && $videoinfo['title'] != "")
      return $videoinfo['title'];
    else
      return "";
  }
  
  private function getDesc($request, $videoinfo) {
    if ($request->input('desc'))
      return $request->input('desc');
    else if ($videoinfo && $videoinfo['description'] != "")
      return $videoinfo['description'];
    else
      return "";
  }
  
  private function deleteThumbIfLast($video) {
    $fileusers = \DB::table('videos')->where('thumb', $video->thumb)->count();
    if ($fileusers == 1) {
      unlink(public_path().$video->thumb);
      return TRUE;
    } else {
      return FALSE;
    }
  }
  
  private function storeThumbnail($video, $videoinfo) {
    try {
      if ($video->thumb && strcmp($video->thumb, '/img/yt/'.$video->emb_src.'.jpg') == 0 
          && file_exists ( public_path().$video->thumb ) ) 
        return $video->thumb;
      else {
        $destFolder ='/img/yt/';
        $destFile = public_path().$destFolder.$video->emb_src.'.jpg';
        $newThumb = fopen($videoinfo['thumbnails']['default']['url'], 'r');
        file_put_contents($destFile, $newThumb);
        if (exif_imagetype($destFile) == 2) {
            $this->deleteThumbIfLast($video);
            return '/img/yt/'.$video->emb_src.'.jpg';
        } else {
          return '/img/yt/default.jpg';
        }
      }
    } catch (Exception $e) {
       return '/img/yt/default.jpg';
    }
  }

}
