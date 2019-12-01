@extends('layouts.app')

@section('title','Zoznam udalostí')

@section('content')

    <div class="container">
        <div class="row">
            @include('events.table')
        </div>

        <div class="row">
        	<div class="col-md-12">
                @if ((Auth::user()->user_type_id > 2))
        		    <a href="{{ route('events/new') }}"><button type="button" class="btn btn-success">Pridať udalosť</button></a>
                @else
                    <a href="" style="color:darkgray;cursor:not-allowed;opacity:0.5;text-decoration: none">
                        <button type="button" class="btn btn-success" disabled>Pridať udalosť</button>
                    </a>
                @endif
        	</div>
        </div>
    </div>
    
@endsection


