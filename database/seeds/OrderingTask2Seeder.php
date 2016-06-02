<?php

use Illuminate\Database\Seeder;

class OrderingTask2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'торт',
			"droppable" => 'kakku',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'календарь',
			"droppable" => 'kalenteri',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'карта',
			"droppable" => 'kartta',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'гитара',
			"droppable" => 'kitara',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'компьютер',
			"droppable" => 'tietokone',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'лампа',
			"droppable" => 'lamppu',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'радио',
			"droppable" => 'radio',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'салат',
			"droppable" => 'salaatti',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'цирк',
			"droppable" => 'sirkus',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'шоколад',
			"droppable" => 'suklaa',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'телевизор',
			"droppable" => 'televisio',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'стул',
			"droppable" => 'tuoli',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            ["type" => 'images',
			"draggable" => 'ваза',
			"droppable" => 'vaasi',
			"task_id" => '2']
        ]);
    }
}
