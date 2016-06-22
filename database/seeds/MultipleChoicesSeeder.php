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
			"choices" => 'kahvia maidon kanssa\r\nvihreää teetä\r\nmustaa kahvia',
			"solution" => 'kahvia maidon kanssa']
        ]);

    DB::table('multiple_choices')->insert([
            [
      "task_id" => '3',
			"question" => 'Millaisen voileivän asiakas halusi?',
			"choices" => 'tonnikalaleivän\r\njuustopatongin\r\nkinkkuvoileivän',
			"solution" => 'kinkkuvoileivän']
        ]);

    DB::table('multiple_choices')->insert([
            [
      "task_id" => '3',
			"question" => 'Mitä syötävää toisessa dialogissa tilattiin?',
			"choices" => 'mansikkaleivos\r\nsuklaakakku\r\nsuklaamousse',
			"solution" => 'suklaakakku']
        ]);


     DB::table('multiple_choices')->insert([
            [
      "task_id" => '3',
			"question" => 'Millaista teetä asiakas halusi?',
			"choices" => 'mustaa\r\nvihreää\r\nhedelmäteetä',
			"solution" => 'mustaa']
        ]);


// Tilaus
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '7',
			"question" => 'Masha kysyy: ”Millaisia ……. teillä on”?',
			"choices" => 'pelmenejä\r\nhampurilaisia\r\nblinejä\r\njälkiruokia',
			"solution" => 'blinejä']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '7',
			"question" => ' Mitä Masha lopulta tilaa? Huom. kaksi oikeaa vaihtoehtoa',
			"choices" => 'blinin\r\nleivoksen\r\nkahvia\r\nteetä',
			"solution" => 'blinin\r\nteetä']
        ]);


// Miten
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '8',
			"question" => 'Mihin poika on menossa?',
			"choices" => 'tavarataloon\r\nMoskovan asemalle\r\nuimahalliin\r\nSuomen asemalle',
			"solution" => 'Suomen asemalle']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '8',
			"question" => 'Millä metroasemalla pitää tehdä vaihto?',
			"choices" => 'Vladimirskaya\r\nSpasskaya\r\nMayakovskaya\r\nNarvskaya',
			"solution" => 'Vladimirskaya']
        ]);

    DB::table('multiple_choices')->insert([
            [
      "task_id" => '8',
			"question" => 'Mikä oli päätepysäkki?',
			"choices" => 'Vladimirskaya\r\nPloschad Lenina\r\nPloschad Vosstanya\r\nAvtovo',
			"solution" => 'Ploschad Lenina']
        ]);


// Tilaus2
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '9',
			"question" => 'Mitä Masha haluaa juoda?',
			"choices" => 'pepsiä\r\ncoca-colaa\r\nteetä\r\nkahvia',
			"solution" => 'pepsiä']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '9',
			"question" => 'Paljonko ostos maksaa?',
			"choices" => '5 euroa\r\n100 ruplaa\r\n65 ruplaa\r\n5 ruplaa',
			"solution" => '65 ruplaa']
        ]);


// Kauanon
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '10',
			"question" => 'Kuinka pitkä aika on oppitunnin loppumiseen?',
			"choices" => '5 min\r\n15 min\r\n30 min\r\n20 min',
			"solution" => '15 min']
        ]);


// Missäon
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '11',
			"question" => 'Mitä paikkaa etsitään?',
			"choices" => 'ruokalaa\r\nfysiikan luokkaa\r\nenglannin luokkaa\r\nrehtorin kansliaa',
			"solution" => 'fysiikan luokkaa']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '11',
			"question" => 'Missä kyseinen paikka sijaitsee?',
			"choices" => 'toisessa kerroksessa\r\nalakerrassa\r\nkolmannessa kerroksessa\r\ntytöt eivät osanneet auttaa',
			"solution" => 'toisessa kerroksessa']
        ]);

// Tapaaminen
    DB::table('multiple_choices')->insert([
            [
      "task_id" => '12',
			"question" => 'Mitkä olivat tyttöjen nimet?',
			"choices" => 'Masha ja Nastya\r\nTanya ja Katya\r\nKatya ja Nastya\r\nTanya ja Nastya',
			"solution" => 'Tanya ja Nastya']
        ]);


    DB::table('multiple_choices')->insert([
            [
      "task_id" => '12',
			"question" => 'Toiselle tytöistä kuului huonoa. Miksi?',
			"choices" => 'hänellä oli vessahätä\r\nhänellä oli nälkä\r\nhänellä oli flunssaa\r\nhän ei ollut nukkunut hyvin',
			"solution" => 'hänellä oli nälkä']
        ]);



    }
}
