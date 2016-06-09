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
                
   
   
    }
}