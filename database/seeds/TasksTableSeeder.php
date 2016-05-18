<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            ["name" => 'tehtävä 1',
			"type" => 'ristikko',
			"exercise_id" => '1']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'tehtävä 2',
			"type" => 'hirsipuu',
			"exercise_id" => '1']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'tehtävä 3',
			"type" => 'täyttö',
			"exercise_id" => '2']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'tehtävä 4',
			"type" => 'täyttö',
			"exercise_id" => '3']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'tehtävä 5',
			"type" => 'ristikko',
			"exercise_id" => '4']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'tehtävä 6',
			"type" => 'hirsipuu',
			"exercise_id" => '4']
        ]);
    }
}
