<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ExerciseLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercise_levels')->insert([
            ["name" => 'alkeet']
        ]);
        DB::table('exercise_levels')->insert([
            ["name" => 'selviytyminen']
        ]);
        DB::table('exercise_levels')->insert([
            ["name" => 'ammatti']
        ]);
    }
}
