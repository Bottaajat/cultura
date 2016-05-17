<?php

use Illuminate\Database\Seeder;

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
            ["name" => 'harjoitustehtävä 1',
			"exercise_level_id" => '1']
        ]);
        DB::table('exercises')->insert([
            ["name" => 'harjoitustehtävä 2',
			"exercise_level_id" => '1']
        ]);
		DB::table('exercises')->insert([
            ["name" => 'harjoitustehtävä 3',
			"exercise_level_id" => '2']
        ]);
		DB::table('exercises')->insert([
            ["name" => 'harjoitustehtävä 4',
			"exercise_level_id" => '3']
        ]);
    }
}
