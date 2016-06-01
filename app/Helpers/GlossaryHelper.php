<?php
function GlossaryFinToRus($glossary)
{
  $rus = preg_split("/(\r\n|\n|\r)/", $glossary->rus);
  $fin = preg_split("/(\r\n|\n|\r)/", $glossary->fin);
  return array_combine($fin,$rus);
}

function GlossaryRusToFin($glossary)
{
  $rus = preg_split("/(\r\n|\n|\r)/", $glossary->rus);
  $fin = preg_split("/(\r\n|\n|\r)/", $glossary->fin);
  return array_combine($rus,$fin);
}