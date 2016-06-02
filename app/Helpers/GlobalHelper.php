<?php
function stringToArray($str)
{
  return preg_split("/(\r\n|\n|\r)/", $str);
}
