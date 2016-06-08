<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ["firstname" => 'Ville',
            "lastname" => 'Virtuaali',
            "is_admin" => True,
            "email" => 'ville.virtuaali@hax.me',
            "phone" => '13371337',
            "intro" => 'Status: Lomalla
            Lempiruoka: Kukkakaali',
            "password" => 'apuvaa',
            "school_id" => 1]
        ]);
        
        DB::table('users')->insert([
            ["firstname" => 'Pipsa',
            "lastname" => 'Pouta',
            "is_admin" => True,
            "email" => 'pp@wut.me',
            "phone" => '13371337',
            "intro" => 'Status: Lomalla
            Lempiruoka: Kukkakaali',
            "password" => 'ruokaa',
            "school_id" => 1]
        ]);
        
    }
}