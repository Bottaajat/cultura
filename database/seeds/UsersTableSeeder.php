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
            ["firstname" => 'Admin',
            "is_admin" => True,
            "email" => 'admin@whm13.louhi.net',
            "password" => bcrypt('dX993469oj5r90D')]
        ]);
    }
}
