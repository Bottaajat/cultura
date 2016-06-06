<?php

use Illuminate\Database\Seeder;

class CrosswordTaskSeeder extends Seeder
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
			"answer" => 'sana',
			"clue" => 'sana',
			"position" => '0.-1',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);
		
		DB::table('crosswords')->insert([
            [
			"answer" => 'sanat',
			"clue" => 'sanat',
			"position" => '1.-2',
			"orientation" => 'vertical',
			"task_id" => '5']
        ]);
		
		DB::table('crosswords')->insert([
            [
			"answer" => 'sanat',
			"clue" => 'sanat',
			"position" => '-2.1',
			"orientation" => 'horizontal',
			"task_id" => '5']
        ]);
    }
}
