@extends('layouts.app')

@section('title','Štatistika hodnoteného testovania')

@section('content')

    <div class="container">
        <div class="row">
            <h1>Štatistika hodnoteného testovania</h1>
        </div>

        @if ($result['taken'])

        <h2>Výsledky testu</h2>

        <div class="row">
            <div class="col-md-12">
                <p>Správne bolo zodpovedaných {{$result['correctAnswers']}} z {{$result['totalQuestions']}} otázok.</p>
            </div>
        </div>

        @else

        <div class="row">
            <div class="col-md-12">
                <p>Tento test ešte nebol odovzdaný.</p>
            </div>
        </div>

        @endif

        <div class="row">
            <div class="col-md-12">
                <a href="{{$returnUrl}}"><button type="button" class="btn btn-primary">Späť</button></a>
            </div>
        </div>
    </div>

@endsection