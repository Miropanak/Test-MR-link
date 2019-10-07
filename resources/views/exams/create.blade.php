@extends('layouts.app')

@section('title','Vytvorenie nového meratelného testovania')

@section('content')
    <div class="container">
        <div class="row">
            <div 
                id='newGradedTest' 
                data-allActivities="{{ $allActivities }}"
                data-fetchEventsUrl="{{ $fetchEventsUrl }}" 
                data-returnUrl="{{ $returnUrl }}" 
                data-createExamUrl="{{ $createExamUrl }}"
            />
        </div>
    </div>
@endsection
