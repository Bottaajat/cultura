<?php
use Illuminate\Database\Seeder;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            ["name" => 'Aakkosjärjestys',
            "type" => 'Sanojen yhdistäminen',
			"assignment" => 'Yhdistä kyrilliset aakkoset latinalaisiin vastineisiinsa',
            "exercise_id" => '1']
            ]);
        DB::table('tasks')->insert([
            ["name" => 'Kuvajärjestys',
            "type" => 'Kuvien yhdistäminen',
			"assignment" => 'Yhdistä venäläiset sanat niitä vastaaviin kuviin',
            "exercise_id" => '2']
            ]);
        DB::table('tasks')->insert([
            ["name" => 'Luetun ymmärtäminen',
            "type" => 'Monivalinta',
			"assignment" => 'Valitse oikea vaihtoehto',
            "exercise_id" => '3']
            ]);
        DB::table('tasks')->insert([
            ["name" => 'Sanajärjestys',
            "type" => 'Sanojen yhdistäminen',
			"assignment" => 'Yhdistä ilmaisujen eri osat toisiinsa',
            "exercise_id" => '3']
            ]);
        DB::table('tasks')->insert([
            ["name" => 'Sanaristikko',
            "type" => 'Sanaristikko',
			"assignment" => 'Tee sanaristikko',
            "exercise_id" => '3']
            ]);
        DB::table('tasks')->insert([
            ["name" => 'Täyttö',
            "type" => 'Täyttö',
			"assignment" => 'Lisää puuttuvat ilmaisut paikoilleen',
            "exercise_id" => '4']
            ]);


        DB::table('tasks')->insert([
            ['name' => 'Videotehtävä (Tilaus)',
            'type' => 'Monivalinta',
            'exercise_id' => '3',
            'video_id' => '1']
            ]);
        DB::table('tasks')->insert([
            ['name' => 'Videotehtävä (Miten)',
            'type' => 'Monivalinta',
           'exercise_id' => '3',
           'video_id' => '6']
            ]);
        DB::table('tasks')->insert([
            ['name' => 'Videotehtävä (Tilaus 2)',
            'type' => 'Monivalinta',
            'exercise_id' => '3',
            'video_id' => '2']
            ]);

        DB::table('tasks')->insert([
            ['name' => 'Videotehtävä (Kauan on?)',
            'type' => 'Monivalinta',
            'exercise_id' => '3',
            'video_id' => '8']
            ]);

        DB::table('tasks')->insert([
            ['name' => 'Videotehtävä (Missä on?)',
            'type' => 'Monivalinta',
            'exercise_id' => '3',
            'video_id' => '9']
            ]);

        DB::table('tasks')->insert([
            ['name' => 'Videotehtävä (Tapaaminen)',
            'type' => 'Monivalinta',
            'exercise_id' => '3',
            'video_id' => '3']
            ]);
            
    }
}
