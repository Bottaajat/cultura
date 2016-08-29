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
      $filename = rand(1111111,9999999).'.'.$extension;
    }

    //Jos päivitetään tiedostoa
    else {
      $filename = pathinfo($resource->src, PATHINFO_FILENAME).'.'.$extension;
    }

    // Poistetaan vanha tiedosto 
    \File::delete(public_path() . $resource->src);
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

// SALLITUT KUVA TIEDOSTO FORMAATIT
function allowedImageExtensions() {
  return ['jpg', 'jpeg', 'jpe', 'jif', 'jfif', 'jfi', 'gif', 'png', 'apng', 'svg', 'bmp', 'dib', 'ico', 'cur'];
}

// SALLITUT AUDIO TIEDOSTO FORMAATIT
function allowedAudioExtensions() {
  return   ['3gp', 'aa', 'aac', 'aax', 'act', 'aiff', 'amr', 'ape', 'au', 'awb', 'dct', 'dss', 'dvf',
            'flac', 'gsm', 'iklax', 'ivs', 'm4a', 'm4b', 'm4p', 'mmf', 'mp3', 'mpc', 'msv', 'ogg', 'oga',
            'ogv', 'ogx', 'spx', 'opus', 'wav', 'wma', 'wave', 'webm'];
}

function belongsToSchool($user) {
  if ($user != NULL && $user->is_admin)
    return true;
  else if($user != NULL && $user->school != NULL)
    return true;
  else
    return false;
}


function checkMembership($user, $school) {
  if ($user != NULL && $user->is_admin)
    return true;
  else if(belongsToSchool($user) && $school != NULL && 
        $user->school->id == $school->id)
    return true;
  else
    return false;
}

function mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

function deleteTaskParts($task) {
  try {
    if($task->type == 'Sanojen yhdistäminen') {
      $orderings = $task->orderings;
      foreach($orderings as $ordering) {
        $ordering->delete();
      }
    }
    if($task->type == 'Kuvien yhdistäminen') {
      $orderings = $task->orderings;
      foreach($orderings as $ordering) {
        File::delete(public_path().'/img/'. $ordering->droppable);
        $ordering->delete();
      }
    }
    if($task->type == 'Monivalinta') {
      $multiplechoises = $task->multiplechoises;
      foreach($multiplechoises as $multiplechoice) {
        $multiplechoice->delete();
      }
    }
    if($task->type == 'Sanaristikko') {
      $crosswords = $task->crosswords;
      foreach($crosswords as $crossword) {
        $crossword->delete();
      }
    }
    if($task->type == 'Täyttö') {
      $filling = $task->filling;
      $filling->delete();
    }
    if ($task->glossary != null)
      $task->glossary->delete();
  } catch (Exception $e) {
    return false;
  }
  return true;
}