<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Kohta :attribute on hyväksyttävä.',
    'active_url'           => 'Syöte :attribute on oltava validi URL.',
    'after'                => 'Syöteen :attribute on oltava päiväys päivämäärän :date jälkeen.',
    'alpha'                => 'Syöte :attribute voi sisältää vain kirjaimia.',
    'alpha_dash'           => 'Syöte :attribute voi sisältää vain numeroita, kirjaimia, ja viivoja.',
    'alpha_num'            => 'Syöte :attribute voi sisältää vain numeroita ja kirjaimia.',
    'array'                => 'Syötteen :attribute on oltava taulukko.',
    'before'               => 'Syötteen :attribute on oltava päivämäärä ennen päivämäärää :date.',
    'between'              => [
        'numeric' => 'Luvun :attribute on oltava välillä :min - :max.',
        'file'    => 'Tiedoston :attribute koon on oltava välillä :min - :max kilotavua.',
        'string'  => 'Syöte :attribute saa sisältää vähintään :min ja enintään :max merkkiä.',
        'array'   => 'Syöte :attribute saa sisältää alkioita väliltä :min - :max.',
    ],
    'boolean'              => 'Kenttä :attribute voi olla joko tosi tai epätosi.',
    'confirmed'            => 'Annettu :attribute vahvistus ei täsmää.',
    'date'                 => 'Annettu :attribute ei ole käypä päivämäärä.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'Tämä :attribute ja :other eivät saa olla samoja.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'distinct'             => 'Kentän :attribute sisältö on oltava erillinen.',
    'email'                => 'Sähköpostiosoite ei kelpaa.',
    'exists'               => 'Valittu :attribute ei kelpaa.',
    'filled'               => 'Syötä :attribute.',
    'image'                => 'Syöteen :attribute on oltava kuva.',
    'in'                   => 'Valittu :attribute on epäkelpo.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'Syötteen :attribute on oltava kokonaisluku.',
    'ip'                   => 'Annettu :attribute ei ole validi IP osoite.',
    'json'                 => 'Annettu :attribute ei ole validi JSON.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'Syötä :attribute, joka on enintään :max merkkiä pitkä.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'Syötä :attribute, joka on vähintään :min merkkiä pitkä.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'Valittu :attribute ei ole sallittu.',
    'numeric'              => 'Syötteen :attribute on oltava numero.',
    'phone'                => 'Puhelinnumero on virheellinen.',
    'present'              => 'Syötekentän :attribute on löydyttävä.',
    'regex'                => 'Syötteen :attribute formaatti ei ole validi.',
    'required'             => 'Syötä :attribute.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'Tämä :attribute ja :other eivät vastaa toisiaan.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'Tämä :attribute ei ole sopiva merkkijono.',
    'timezone'             => 'Tämä :attribute ei ole sopiva aikavyöhyke.',
    'unique'               => 'Tämä :attribute on varattu.',
    'url'                  => 'Virheellinen :attribute.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'rus' => [
            'required' => 'Syötä venäjänkielisiä sanoja',
            'max' => 'Venäjänkielisten sanojen kokonaispituus on 400 merkkiä.'
        ],
        'fin' => [
            'required' => 'Syötä suomenkielisiä sanoja',
            'max' => 'Suomenkielisten sanojen kokonaispituus on 400 merkkiä.'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
      'firstname' => 'etunimi',
      'lastname' => 'sukunimi',
      'email' => 'sähköpostiosoite',
      'phone' => 'puhelinnumero',
      'password' => 'salasana',
      'name' => 'nimi',
      'description' => 'kuvaus',
      'desc' => 'kuvaus',
      'title' => 'otsikko',
      'label' => 'materiaalin otsikko',
      'contents' => 'sisältö',
    ],

];
