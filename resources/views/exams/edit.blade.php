@extends('layouts.app')

@section('title','Zoznam testov')

@section('content')
    <h3>{{$test->name}}</h3>
    @foreach($test->events as $event)
        <span>{{$event->header}}</span><br>
    @endforeach
@endsection