@extends('layouts.app')

@section('title','Zoznam testov')

@section('content')
    <h1>Testy</h1>
    @foreach($tests as $test)
        <h3>{{$test->name}}</h3>
        @foreach($test->events as $event)
            <span>{{$event->header}}</span><br>
        @endforeach
    @endforeach
    {{dd($tests)}}
@endsection