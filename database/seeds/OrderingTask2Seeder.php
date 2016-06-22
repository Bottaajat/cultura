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
			"droppable" => 'kakku.gif',
			"showable" => 'торт',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'календарь',
			"droppable" => 'kalenteri.gif',
			"showable" => 'календарь',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'карта',
			"droppable" => 'kartta.gif',
			"showable" => 'карта',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'гитара',
			"droppable" => 'kitara.gif',
			"showable" => 'гитара',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'компьютер',
			"droppable" => 'kompjuter.png',
			"showable" => 'компьютер',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'лампа',
			"droppable" => 'lamppu.gif',
			"showable" => 'лампа',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'радио',
			"droppable" => 'radio.gif',
			"showable" => 'радио',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'салат',
			"droppable" => 'salaatti.gif',
			"showable" => 'салат',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'цирк',
			"droppable" => 'sirkus.gif',
			"showable" => 'цирк',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'шоколад',
			"droppable" => 'suklaa.gif',
			"showable" => 'шоколад',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'телевизор',
			"droppable" => 'telek.gif',
			"showable" => 'телевизор',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'стул',
			"droppable" => 'tuoli.gif',
			"showable" => 'стул',
			"task_id" => '2']
        ]);

		DB::table('orderings')->insert([
            [
			"draggable" => 'ваза',
			"droppable" => 'vaasi.gif',
			"showable" => 'ваза',
			"task_id" => '2']
        ]);
    }
}
