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
            "type" => 'Monivalinta',
            "exercise_id" => '3']
            ]);
        DB::table('tasks')->insert([
                ["name" => 'Sanajärjestys',
                 "type" => 'järjestys/sanat',
                 "exercise_id" => '3']
            ]);
        DB::table('tasks')->insert([
                ["name" => 'Sanaristikko',
                 "type" => 'Sanaristikko',
                 "exercise_id" => '3']
            ]);
        DB::table('tasks')->insert([
                ["name" => 'Täyttö',
                 "type" => 'Täyttö',
                 "exercise_id" => '4']
            ]);
        DB::table('tasks')->insert([
              ['name' => 'Videotehtävä',
               'type' => 'Monivalinta',
               'exercise_id' => '3',
               'video_id' => '1']
            ]);
    }
}
