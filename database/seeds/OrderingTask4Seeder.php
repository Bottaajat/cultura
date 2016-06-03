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
            [
			"draggable" => 'Какой',
			"droppable" => 'сандвич',
			"showable" => 'Какой сандвич',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'Это',
			"droppable" => 'всё',
			"showable" => 'Это всё',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'У вас есть',
			"droppable" => 'меню',
			"showable" => 'У вас есть меню',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'Сколько',
			"droppable" => 'стоит',
			"showable" => 'Сколько стоит',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'Добрый',
			"droppable" => 'день',
			"showable" => 'Добрый день',
			"task_id" => '4']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'Что',
			"droppable" => 'Вам',
			"showable" => 'Что Вам',
			"task_id" => '4']
        ]);
    }
}
