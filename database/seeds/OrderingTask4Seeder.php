<?php

use Illuminate\Database\Seeder;

class OrderingTask4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('orderings')->insert([
            ["type" => 'words',
			"draggable" => 'Какой',
			"droppable" => 'сандвич',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'words',
			"draggable" => 'Это',
			"droppable" => 'всё',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'words',
			"draggable" => 'У вас есть',
			"droppable" => 'меню',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'words',
			"draggable" => 'Сколько',
			"droppable" => 'стоит',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'words',
			"draggable" => 'Добрый',
			"droppable" => 'день',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'words',
			"draggable" => 'Что',
			"droppable" => 'Вам',
			"task_id" => '4']
        ]);
    }
}
