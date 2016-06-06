<?php

use Illuminate\Database\Seeder;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignments')->insert([
            [
			       "content" => 'Yhdistä kyrilliset aakkoset latinalaisiin vastineisiinsa',
			       "task_id" => '1']
            ]);
        DB::table('assignments')->insert([
            [
			       "content" => 'Yhdistä venäläiset sanat niitä vastaaviin kuviin',
			       "task_id" => '2']
            ]);
        DB::table('assignments')->insert([
            [
			       "content" => 'Valitse oikea vaihtoehto',
			       "task_id" => '3']
            ]);
        DB::table('assignments')->insert([
            [
			       "content" => 'Yhdistä ilmaisujen eri osat toisiinsa',
			       "task_id" => '4']
            ]);
            

    }
}
