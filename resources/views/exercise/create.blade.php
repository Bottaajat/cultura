@extends('layouts.master')

@section('content')




{!! Form::open(array('url' => 'testi/testi')) !!}
{!! Form::label('Harjoituksen nimi') !!}
    {!! Form::text('exercise', null, array('required', 'class'=>'form-control', 'placeholder'=>'harjoitus')) !!}
{!! Form::label('Aihe') !!}
	{!! Form::select('topic', $topics, null, ['class' => 'form-control']) !!}
{!! Form::close() !!}

@stop