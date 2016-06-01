<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('descriptions')->insert([
          ["content" => 'Kyrillisessä kirjaimistossa on 33 kirjainta, joista kaksi ei ole varsinaisia kirjaimia, vaan merkkejä (pehmennysmerkki ja kova merkki). Iso osa kyrillisistä kirjaimista on helppoja tunnistaa ja uudetkin oppii nopeasti. Venäjän kuuluisasta ”7 ässästä” 6 löytyy muistakin kielistä (esim. englannista), joten oppiminen ei varmasti kaadu niihin!',
          "exercise_id" => '1']
      ]);

      DB::table('descriptions')->insert([
          ["content" => 'Paina kirjainta kuullaksesi ääntämyksen!',
          "exercise_id" => '1']
      ]);

      DB::table('descriptions')->insert([
          ["content" => 'Tässä harjoituksessa opit muutaman sanan venäjäksi kuvien avulla.',
          "exercise_id" => '2']
      ]);
    }
}
