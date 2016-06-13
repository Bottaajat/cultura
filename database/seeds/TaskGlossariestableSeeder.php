<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaskGlossariesTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('task_glossaries')->insert([

    ['rus' => 'путешествовать
    несколько лет назад
    мне случилось
    во-первых
    связаться
    получить
    довольно быстро
    ездить
    попасть
    к счастье
    пострадавшие
    позвонить
    видеть
    страшно
    ',

    'fin' => 'matkustella
    muutama vuosi sitten
    minulle sattui
    ensinnäkin
    ottaa yhteyttä
    saada
    melko nopeasti
    matkustaa
    joutua
    onneksi
    loukkaantuneet
    soittaa
    nähdä
    kauheaa
    ',

    'task_id' => '6' ]]);
      }
    }
