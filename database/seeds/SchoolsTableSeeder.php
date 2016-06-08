<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            ["name" => 'Omnia']
        ]);
    }
}