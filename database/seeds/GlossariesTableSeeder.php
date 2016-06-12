<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GlossariesTableSeeder extends Seeder
{
  public function run()
  {
      DB::table('glossaries')->insert([
        
['rus' => 'Что Вам?
кофе
молоко; с молоком
бутерброд
ветчина; с ветчиной 
Это всё? 
Сколько стоит?
евро',
             
'fin' => 'Mitä saisi olla?
kahvi
maito; maidolla
voileipä
kinkku; kinkulla
Oliko siinä kaikki?
Paljonko maksaa?
euro',
            
'exercise_id' => '3' ]]);


DB::table('glossaries')->insert([
        
['rus' => 'У вас есть?
меню
по-русски
конечно
вот
шоколадный торт
чай
чёрный',
             
'fin' => 'Onko teillä?
menu, ruokalista
venäjäksi
tietenkin, totta kai
tässä
suklaakakku
tee
musta',
            
'exercise_id' => '3' ]]);


DB::table('glossaries')->insert([
        
['rus' => 'На помощь!	
пожар
МЧС: министерство по чрезвычайным ситуациям
пожарные
кража
украсть
Мой паспорт украден.
Мой кошелёк украден.
Моя сумка украдена.
полиция
полицейский участок, отделение полиции
страхование
справка
Посольство Финляндии (в Москве)
Консульство Финляндии (в Петербурге)
авария / несчастный случай
Помогите!
Помощь!
первая помощь
скорая помощь
',
             
'fin' => 'Apuun!
tulipalo
”pelastuslaitos”
palokunta
varkaus
varastaa
Passini on varastettu.
Lompakkoni on varastettu.
Laukkuni on varastettu.
poliisi
poliisiasema
vakuutus
lupakirja, kuitti (esim. rekisteröinnin aikana)
Suomen suurlähetystö (Moskova)
Suomen konsulaatti (Pietari)
onnettomuus
Auttakaa!
Apua!
ensiapu
ambulanssi
',
            
'exercise_id' => '4' ]]);

DB::table('glossaries')->insert([
        
['rus' => 'путешествовать
несколько лет назад
мне случилось
во-первых
связаться
получить
довольно быстро
ездить
попасть
к счастье
пострадавшие
позвонить
видеть
страшно
',
             
'fin' => 'matkustella
muutama vuosi sitten
minulle sattui
ensinnäkin
ottaa yhteyttä
saada
melko nopeasti
matkustaa
joutua
onneksi
loukkaantuneet
soittaa
nähdä
kauheaa
',
            
'task_id' => '6' ]]);
  }
}