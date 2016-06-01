<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GlossariesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('glossaries')->insert([
            ['rus' => 'Сколько стоит?',
             'fin' => 'Paljonko maksaa?',
             'material_id' => '47' ]]);
    }
}
