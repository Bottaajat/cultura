<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            ['label' => 'А а',
             'type' => 'sound',
             'contents' => 'a',
             'src' => '/audio/a.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Б б',
             'type' => 'sound',
             'contents' => 'b',
             'src' => '/audio/b.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'В в',
             'type' => 'sound',
             'contents' => 'v',
             'src' => '/audio/v.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Г г',
             'type' => 'sound',
             'contents' => 'g',
             'src' => '/audio/g.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Д д',
             'type' => 'sound',
             'contents' => 'd',
             'src' => '/audio/d.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Е е',
             'type' => 'sound',
             'contents' => '(j)e',
             'src' => '/audio/je.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ё ё',
             'type' => 'sound',
             'contents' => '(j)o',
             'src' => '/audio/jo.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ж ж',
             'type' => 'sound',
             'contents' => 'ž',
             'src' => '/audio/zh.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'З з',
             'type' => 'sound',
             'contents' => 'z',
             'src' => '/audio/ze.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'И и',
             'type' => 'sound',
             'contents' => 'i',
             'src' => '/audio/ii.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Й й',
             'type' => 'sound',
             'contents' => 'j',
             'src' => '/audio/j.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'К к',
             'type' => 'sound',
             'contents' => 'k',
             'src' => '/audio/k.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Л л',
             'type' => 'sound',
             'contents' => 'l',
             'src' => '/audio/l.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'М м',
             'type' => 'sound',
             'contents' => 'm',
             'src' => '/audio/m.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Н н',
             'type' => 'sound',
             'contents' => 'n',
             'src' => '/audio/n.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'О о',
             'type' => 'sound',
             'contents' => 'o',
             'src' => '/audio/o.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'П п',
             'type' => 'sound',
             'contents' => 'p',
             'src' => '/audio/p.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Р р',
             'type' => 'sound',
             'contents' => 'r',
             'src' => '/audio/r.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'С с',
             'type' => 'sound',
             'contents' => 's',
             'src' => '/audio/s.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Т т',
             'type' => 'sound',
             'contents' => 't',
             'src' => '/audio/t.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'У у',
             'type' => 'sound',
             'contents' => 'u',
             'src' => '/audio/u.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ф ф',
             'type' => 'sound',
             'contents' => 'f',
             'src' => '/audio/f.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Х х',
             'type' => 'sound',
             'contents' => 'h',
             'src' => '/audio/h.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ц ц',
             'type' => 'sound',
             'contents' => 'ts',
             'src' => '/audio/ts.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ч ч',
             'type' => 'sound',
             'contents' => 'tš',
             'src' => '/audio/ch.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ш ш',
             'type' => 'sound',
             'contents' => 'š',
             'src' => '/audio/sh.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Щ щ',
             'type' => 'sound',
             'contents' => 'šš',
             'src' => '/audio/shch.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ъ ъ',
             'type' => 'sound',
             'contents' => 'kova merkki',
             'src' => '/audio/tv.znak.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ы ы',
             'type' => 'sound',
             'contents' => 'taka i (y)',
             'src' => '/audio/ы.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ь ь',
             'type' => 'sound',
             'contents' => 'pehmeä merkki',
             'src' => '/audio/mjag.znak.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Э э',
             'type' => 'sound',
             'contents' => 'e',
             'src' => '/audio/e.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Ю ю',
             'type' => 'sound',
             'contents' => '(j)u',
             'src' => '/audio/ju.mp3',
             'exercise_id' => '1']
        ]);
        DB::table('materials')->insert([
            ['label' => 'Я я',
             'type' => 'sound',
             'contents' => '(j)a',
             'src' => '/audio/ja.mp3',
             'exercise_id' => '1']
        ]);


        DB::table('materials')->insert([
            ['label' => 'торт',
             'type' => 'image',
             'contents' => 'kakku',
             'src' => '/img/kakku.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'календарь',
             'type' => 'image',
             'contents' => 'kalenteri',
             'src' => '/img/kalenteri.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'карта',
             'type' => 'image',
             'contents' => 'kartta',
             'src' => '/img/kartta.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'гитара',
             'type' => 'image',
             'contents' => 'kitara',
             'src' => '/img/kitara.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'компьютер',
             'type' => 'image',
             'contents' => 'tietokone',
             'src' => '/img/kompjuter.png',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'лампа',
             'type' => 'image',
             'contents' => 'lamppu',
             'src' => '/img/lamppu.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'радио',
             'type' => 'image',
             'contents' => 'radio',
             'src' => '/img/radio.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'салат',
             'type' => 'image',
             'contents' => 'salaatti',
             'src' => '/img/salaatti.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'цирк',
             'type' => 'image',
             'contents' => 'sirkus',
             'src' => '/img/sirkus.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'шоколад',
             'type' => 'image',
             'contents' => 'suklaa',
             'src' => '/img/suklaa.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'телевизор',
             'type' => 'image',
             'contents' => 'televisio',
             'src' => '/img/telek.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'стул',
             'type' => 'image',
             'contents' => 'tuoli',
             'src' => '/img/tuoli.gif',
             'exercise_id' => '2']
        ]);
        DB::table('materials')->insert([
            ['label' => 'ваза',
             'type' => 'image',
             'contents' => 'vaasi',
             'src' => '/img/vaasi.gif',
             'exercise_id' => '2']
        ]);

        DB::table('materials')->insert([
          [
           'type' => 'text',
           'contents' => '1)
           
                          Официант: 	Здравствуйте!
                          Клиент:	Здравствуйте!
                          Официант:	Что Вам?
                          Клиент:	Мне кофе с молоком и бутерброд.
                          Официант:	Какой бутерброд?
                          Клиент:	Да, это всё. Сколько стоит?
                          Официант:	Хорошо. Это всё?
                          Клиент:	С ветчиной, пожалуйста.
                          Официант:	6 евро.',
           'exercise_id' => '3'
          ]
        ]);
        DB::table('materials')->insert([
          [
           'type' => 'text',
           'contents' => 'Словарь			Sanasto

                          Что Вам?			Mitä saisi olla?
                          кофе				kahvi
                          молоко; с молоком		maito; maidolla
                          бутерброд			voileipä
                          ветчина; с ветчиной		kinkku; kinkulla
                          Это всё?			Oliko siinä kaikki?
                          Сколько стоит?			Paljonko maksaa?
                          евро				euro',
           'exercise_id' => '3'
          ]
        ]);
        DB::table('materials')->insert([
          [
           'type' => 'text',
           'contents' => '2)

                          Официант:	Добрый вечер! Вот меню.
                          Клиент:	Добрый вечер! У вас есть меню по-русски?
                          Официант:	Да, конечно. Вот, пожалуйста.
                          Клиент: 	Спасибо. ----- Мне, пожалуйста, шоколадный торт и чай.
                          Официант: 	Чёрный или зелёный чай?
                          Клиент:	Чёрный, пожалуйста. Сколько стоит?
                          Официант:	7, 50.',
           'exercise_id' => '3'
          ]
        ]);
        DB::table('materials')->insert([
          [
           'type' => 'text',
           'contents' => 'Словарь			Sanasto

                          У вас есть?			Onko teillä?
                          меню				menu, ruokalista
                          по-русски			venäjäksi
                          конечно			tietenkin, totta kai
                          вот				tässä
                          шоколадный торт		suklaakakku
                          чай				tee
                          чёрный				musta
                          или				vai, tai
                          зелёный			vihreä',
           'exercise_id' => '3'
          ]
        ]);
    }
}
