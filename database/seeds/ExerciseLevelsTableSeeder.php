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
<<<<<<< HEAD
            ["name" => 'alkeet']
        ]);
        DB::table('exercise_levels')->insert([
            ["name" => 'selviytyminen']
        ]);
        DB::table('exercise_levels')->insert([
            ["name" => 'ammatti']
=======
            ["name" => 'alkeet'],
        ]);
		DB::table('exercise_levels')->insert([
            ["name" => 'selviytyminen'],
        ]);
		DB::table('exercise_levels')->insert([
            ["name" => 'ammatti'],
>>>>>>> e1f1f9295a181194b360876f66cb36840e19b915
        ]);
    }
}
