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
            "password" => '$2y$10$vP4I.1ZDAKhWCPmHy82kresGURDO10ajRVbcTeZA61grGchHDIp7S']
        ]);
    }
}
