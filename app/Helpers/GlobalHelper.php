<?php
function stringToArray($str)
{
  return preg_split("/(\r\n|\n|\r)/", $str);
}

function truncateString($string,$length)
{
  if (strlen($string) > $length)
  {
      $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
      $string = $string . "...";
  }
  return $string;
}

/**
*   Check request for a file and save it on disk.
*
*   @param Illuminate\Http\Request $request
*   @param Illuminate\Database\Eloquent\Model $resource
*   @param $destination
*   @return boolean
*/
function handleFile(Illuminate\Http\Request $request, Illuminate\Database\Eloquent\Model $resource, $destination) {
  // requestissa on oltava file niminen alkio. Se pitää asettaa myös formissa fileksi
  if($request->hasFile('file')) {

    // otetaan tiedosto $file muuttujaan ja tiedostopääte $extension
    $file = $request->file('file');
    $extension = $file->getClientOriginalExtension();

    //Jos luodaan uusi tiedosto
    if(strlen($resource->src) == 0) {
      $filename = rand(11111,99999).'.'.$extension;
    }

    //Jos päivitetään tiedostoa
    else {
      $filename = basename($resource->src);
    }

    //siirretään tiedosto $destination polkuun
    $file->move($destination, $filename);

    //napataan public kansion loppu talteen esim /img/kuva.jpg
    $resource->src = str_replace(public_path(), "", $destination) . "/" . $filename;
    return true;
  }
  return false;
}

function allowedExtension ($extension, $array) {
  return in_array($extension, $array);
}

// SALLITUT AUDIO TIEDOSTO FORMAATIT
function allowedImageExtensions() {
  return ['jpg', 'jpeg', 'jpe', 'jif', 'jfif', 'jfi', 'gif', 'png', 'apng', 'svg', 'bmp', 'dib', 'ico', 'cur'];
}

// SALLITUT KUVA TIEDOSTO FORMAATIT
function allowedAudioExtensions() {
  return   ['3gp', 'aa', 'aac', 'aax', 'act', 'aiff', 'amr', 'ape', 'au', 'awb', 'dct', 'dss', 'dvf',
            'flac', 'gsm', 'iklax', 'ivs', 'm4a', 'm4b', 'm4p', 'mmf', 'mp3', 'mpc', 'msv', 'ogg', 'oga',
            'ogv', 'ogx', 'spx', 'opus', 'wav', 'wma', 'wave', 'webm'];
}
