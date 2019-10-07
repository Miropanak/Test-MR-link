@extends('layouts.app')

@section('title','Spustený test')

@section('content')
    @if($test->startDate <= date("Y-m-d h:i:s", time()))
        <h3>{{$test->name}}</h3>
        @foreach($test->events as $event)
            <span>{{$event->header}}</span><br>
        @endforeach
    @else
        <p>Test zatiaľ nie je prístupný.</p>
    @endif
@endsection