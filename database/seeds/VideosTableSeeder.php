<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert([
            ["emb_src" => 'mrZzcU2wyJw',
            "title" => 'Title1',
            "desc" => 'Kuvaus1',
            "thumb" => '/img/yt/default.jpg',

            "school_id" => 1]
        ]);

        DB::table('videos')->insert([
            ["emb_src" => 'auLDGBX8WB4',
            "title" => 'Title2',
            "desc" => 'Kuvaus2',
            "thumb" => '/img/yt/default.jpg',

            "school_id" => 1]
        ]);

    }
}
