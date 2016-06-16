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
            ["emb_src" => 'hrIiMxtFagg',
            "title" => 'tilaus',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'jvAdcr7FJZw',
            "title" => 'tilaus2',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'hrIiMxtFagg',
            "title" => 'tapaaminen',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'iLi5cLZnmKw',
            "title" => 'tapaaminen2',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'XviNCXlTrmo',
            "title" => 'saisinko',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'upDMikA7eiM',
            "title" => 'miten',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'upDMikA7eiM',
            "title" => 'missaon',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'upDMikA7eiM',
            "title" => 'kauanon',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
        DB::table('videos')->insert([
            ["emb_src" => 'upDMikA7eiM',
            "title" => '1. Esittäytyminen',
            "desc" => '',
            "thumb" => '/img/yt/default.jpg',
            "school_id" => 1]
        ]);
    }
}
