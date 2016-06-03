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
            [
			"draggable" => 'торт',
			"droppable" => 'kakku',
			"showable" => 'торт',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'календарь',
			"droppable" => 'kalenteri',
			"showable" => 'календарь',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'карта',
			"droppable" => 'kartta',
			"showable" => 'карта',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'гитара',
			"droppable" => 'kitara',
			"showable" => 'гитара',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'компьютер',
			"droppable" => 'tietokone',
			"showable" => 'компьютер',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'лампа',
			"droppable" => 'lamppu',
			"showable" => 'лампа',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'радио',
			"droppable" => 'radio',
			"showable" => 'радио',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'салат',
			"droppable" => 'salaatti',
			"showable" => 'салат',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'цирк',
			"droppable" => 'sirkus',
			"showable" => 'цирк',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'шоколад',
			"droppable" => 'suklaa',
			"showable" => 'шоколад',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'телевизор',
			"droppable" => 'televisio',
			"showable" => 'телевизор',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'стул',
			"droppable" => 'tuoli',
			"showable" => 'стул',
			"task_id" => '2']
        ]);
		
		DB::table('orderings')->insert([
            [
			"draggable" => 'ваза',
			"droppable" => 'vaasi',
			"showable" => 'ваза',
			"task_id" => '2']
        ]);
    }
}
