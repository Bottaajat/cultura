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
