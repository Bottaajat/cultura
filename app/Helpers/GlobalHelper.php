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
    $resource->src = "/" . basename($destination) . "/" . $filename;
    return true;
  }
  return false;
}
