@extends('layouts.app')

@section('title','Zoznam aktivít')

@section('content')

    <div class="container">
        <div class="row">
            <?php
                use Jenssegers\Agent\Agent;
                $agent = new Agent();
            ?>
        	@include('activities.table', ['agent' => $agent])
        </div>

        <div class="row">
        	<div class="col-md-12">
                @if(!(Auth::user()->user_type_id === 2))
        		<a href="{{ route('activities/new') }}"><button type="button" class="btn btn-success">Pridať aktivitu</button></a>
        	    @endif
            </div>
        </div>
    </div>
    
@endsection
