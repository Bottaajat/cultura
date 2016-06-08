<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            ["name" => 'Alkeet']
        ]);
        DB::table('topics')->insert([
            ["name" => 'Selviytyminen']
        ]);
    }
}
