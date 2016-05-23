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
            ["name" => 'Tehtävä 1',
			"type" => 'Ristikko',
			"exercise_id" => '1']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 2',
			"type" => 'Hirsipuu',
			"exercise_id" => '1']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 3',
			"type" => 'Täyttö',
			"exercise_id" => '2']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 4',
			"type" => 'Täyttö',
			"exercise_id" => '3']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 5',
			"type" => 'Ristikko',
			"exercise_id" => '4']
        ]);
		
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 6',
			"type" => 'Hirsipuu',
			"exercise_id" => '4']
        ]);
    }
}
