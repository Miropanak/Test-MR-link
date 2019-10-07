@extends('layouts.app')

@section('title','Test')

@section('content')
    <div class="container">
        <div class="row">
	         <div id="informativeTest" data-fetchUrl="{{ $fetchUrl }}" data-returnUrl="{{ $returnUrl }}"></div>
        </div>
    </div>
@endsection
