<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('exercises')->insert([
            ["name" => 'Aakkoset',
            "description" => 'Kyrillisessä kirjaimistossa on 33 kirjainta, joista kaksi ei ole varsinaisia kirjaimia, vaan merkkejä (pehmennysmerkki ja kova merkki). Iso osa kyrillisistä kirjaimista on helppoja tunnistaa ja uudetkin oppii nopeasti. Venäjän kuuluisasta ”7 ässästä” 6 löytyy muistakin kielistä (esim. englannista), joten oppiminen ei varmasti kaadu niihin!

            Paina kirjainta kuullaksesi ääntämyksen!',
            "topic_id" => '1']
        ]);
        DB::table('exercises')->insert([
            ["name" => 'Sanastoharjoitus',
            "description" => 'Tässä harjoituksessa opit muutaman sanan venäjäksi kuvien avulla.',
            "topic_id" => '1']
        ]);
        DB::table('exercises')->insert([
            ["name" => 'Kahvilassa',
            "description" => 'Lue dialogit ja tee kaksi tehtävää.',
            "topic_id" => '2']
        ]);

        DB::table('exercises')->insert([
            ["name" => 'Hätätilanne',
            "description" => 'Jos jotain sattuuu… Alla on muutamia hyödyllisiä sanoja ja ilmauksia tulipalon, varkauden tai muun epämiellyttävän asian tapahtuessa. Lue sanasto ja tee alla oleva tehtävä.',
            "topic_id" => '2']
        ]);


    }
}
