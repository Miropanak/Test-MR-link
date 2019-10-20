@extends('layouts.app')

@section('title','Merateľné testovanie')

@section('content')
    <div class="container">
        <div class="row">
            <div id="examTest" data-fetchUrl="{{ $fetchUrl }}" data-submitUrl="{{ $submitUrl }}" data-resultUrl="{{ $resultUrl }}" data-returnUrl="{{ $returnUrl }}" data-testId="{{ $testId }}" data-endTimestamp="{{ $endTimestamp }}"></div>
        </div>
    </div>
@endsection
