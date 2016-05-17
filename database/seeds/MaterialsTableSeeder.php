<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
        	['label' => ,
        	 'type' => 'text',
        	  'contents' => 'Hello World!'
        	  'exercise_id' => '1']
        ]);
    }
}
