<?php

use Illuminate\Database\Seeder;

class CrosswordTask5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		DB::table('crosswords')->insert([
            [
			"answer" => 'кофе',
			"clue" => 'kahvi',
			"position" => '0.0',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);

		DB::table('crosswords')->insert([
            [
			"answer" => 'торт',
			"clue" => 'kakku',
			"position" => '-1.1',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);

		DB::table('crosswords')->insert([
            [
			"answer" => 'чёрный',
			"clue" => 'musta',
			"position" => '-3.2',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);

		DB::table('crosswords')->insert([
            [
			"answer" => 'ветчина',
			"clue" => 'kinkku',
			"position" => '-1.3',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);

		DB::table('crosswords')->insert([
            [
			"answer" => 'чай',
			"clue" => 'tee',
			"position" => '0.4',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);

		DB::table('crosswords')->insert([
            [
			"answer" => 'меню',
			"clue" => 'ruokalista',
			"position" => '-2.5',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);

		DB::table('crosswords')->insert([
            [
			"answer" => 'хорошо',
			"clue" => 'hyvin/hyvää',
			"position" => '-3.6',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);

		DB::table('crosswords')->insert([
            [
			"answer" => 'конечно',
			"clue" => 'tietysti',
			"position" => '0.0',
			"orientation" => 'vertical',
			"task_id" => '5']
        ]);
    }
}
