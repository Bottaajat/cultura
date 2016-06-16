<?php

use Illuminate\Database\Seeder;

class MultipleChoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    DB::table('multiple_choices')->insert([
            [
      "task_id" => '3',
			"question" => 'Mitä ensimmäisessä dialogissa juotiin?',
			"choices" => 'kahvia maidon kanssa
vihreää teetä
mustaa kahvia',
			"solution" => 'kahvia maidon kanssa']
        ]);

    DB::table('multiple_choices')->insert([
            [
      "task_id" => '3',
			"question" => 'Millaisen voileivän asiakas halusi?',
			"choices" => 'tonnikalaleivän
juustopatongin
kinkkuvoileivän',
			"solution" => 'kinkkuvoileivän']
        ]);

    DB::table('multiple_choices')->insert([
            [
      "task_id" => '3',
			"question" => 'Mitä syötävää toisessa dialogissa tilattiin?',
			"choices" => 'mansikkaleivos
suklaakakku
suklaamousse',
			"solution" => 'suklaakakku']
        ]);


     DB::table('multiple_choices')->insert([
            [
      "task_id" => '3',
			"question" => 'Millaista teetä asiakas halusi?',
			"choices" => 'mustaa
vihreää
hedelmäteetä',
			"solution" => 'mustaa']
        ]);


// Tilaus
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '7',
			"question" => 'Masha kysyy: ”Millaisia ……. teillä on”?',
			"choices" => 'pelmenejä
hampurilaisia
blinejä
jälkiruokia',
			"solution" => 'blinejä']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '7',
			"question" => ' Mitä Masha lopulta tilaa? Huom. kaksi oikeaa vaihtoehtoa',
			"choices" => 'blinin
leivoksen
kahvia
teetä',
			"solution" => 'blinin
teetä']
        ]);


// Miten
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '8',
			"question" => 'Mihin poika on menossa?',
			"choices" => 'tavarataloon
Moskovan asemalle
uimahalliin
Suomen asemalle',
			"solution" => 'Suomen asemalle']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '8',
			"question" => 'Millä metroasemalla pitää tehdä vaihto?',
			"choices" => 'Vladimirskaya
Spasskaya
Mayakovskaya
Narvskaya',
			"solution" => 'Vladimirskaya']
        ]);

    DB::table('multiple_choices')->insert([
            [
      "task_id" => '8',
			"question" => 'Mikä oli päätepysäkki?',
			"choices" => 'Vladimirskaya
Ploschad Lenina
Ploschad Vosstanya
Avtovo',
			"solution" => 'Ploschad Lenina']
        ]);


// Tilaus2
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '9',
			"question" => 'Mitä Masha haluaa juoda?',
			"choices" => 'pepsiä
coca-colaa
teetä
kahvia',
			"solution" => 'pepsiä']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '9',
			"question" => 'Paljonko ostos maksaa?',
			"choices" => '5 euroa
100 ruplaa
65 ruplaa
5 ruplaa',
			"solution" => '5 euroa'] // FIX THIS !!
        ]);


// Kauanon
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '10',
			"question" => 'Kuinka pitkä aika on oppitunnin loppumiseen?',
			"choices" => '5 min
15 min
30 min
20 min',
			"solution" => '15 min']
        ]);


// Missäon
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '11',
			"question" => 'Mitä paikkaa etsitään?',
			"choices" => 'ruokalaa
fysiikan luokkaa
englannin luokkaa
rehtorin kansliaa',
			"solution" => 'fysiikan luokkaa']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '11',
			"question" => 'Missä kyseinen paikka sijaitsee?',
			"choices" => 'toisessa kerroksessa
alakerrassa
kolmannessa kerroksessa
tytöt eivät osanneet auttaa',
			"solution" => 'toisessa kerroksessa']
        ]);

// Tapaaminen
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '12',
			"question" => 'Mitkä olivat tyttöjen nimet?',
			"choices" => 'Masha ja Nastya
Tanya ja Katya
Katya ja Nastya
Tanya ja Nastya',
			"solution" => 'Tanya ja Nastya']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '12',
			"question" => 'Toiselle tytöistä kuului huonoa. Miksi?',
			"choices" => 'hänellä oli vessahätä
hänellä oli nälkä
hänellä oli flunssaa
hän ei ollut nukkunut hyvin',
			"solution" => 'hänellä oli nälkä']
        ]);



    }
}
