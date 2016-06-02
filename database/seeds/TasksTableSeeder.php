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
            ["name" => 'Aakkosjärjestys',
			       "type" => 'järjestys/sanat',
			       "exercise_id" => '1']
            ]);
        DB::table('tasks')->insert([
            ["name" => 'Kuvajärjestys',
			       "type" => 'järjestys/kuvat',
			       "exercise_id" => '2']
            ]);
        DB::table('tasks')->insert([
            ["name" => 'Luetun ymmärtäminen',
			       "type" => 'monivalinta',
			       "exercise_id" => '3']
            ]);
		DB::table('tasks')->insert([
            ["name" => 'Sanajärjestys',
			       "type" => 'järjestys/sanat',
			       "exercise_id" => '3']
            ]);
    // MOKKI DATAA!
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 2',
			"type" => 'Täyttö',
			"exercise_id" => '4']
        ]);
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 3',
			"type" => 'Ristikko',
			"exercise_id" => '5']
        ]);
		DB::table('tasks')->insert([
            ["name" => 'Tehtävä 4',
			"type" => 'Hirsipuu',
			"exercise_id" => '5']
        ]);
    }
}