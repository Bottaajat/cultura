<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('exercises')->insert([
            ["name" => 'Aakkoset',
            "topic_id" => '1']
        ]);
        DB::table('exercises')->insert([
            ["name" => 'Sanastoharjoitus',
            "topic_id" => '1']
        ]);
        DB::table('exercises')->insert([
            ["name" => 'Kahvilassa',
			"topic_id" => '2']
        ]);

        // MOKKI DATAA!
		    DB::table('exercises')->insert([
            ["name" => 'Harjoitustehtävä 1',
			       "topic_id" => '3']
            ]);
		   DB::table('exercises')->insert([
            ["name" => 'Harjoitustehtävä 2',
			       "topic_id" => '3']
            ]);
    }
}
