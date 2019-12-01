<?php

use App\Option;
use App\EventType;
use App\Event;
use App\Help;
?>

@extends('layouts.app')
@section('title',$event->header)

<?php $event_type = EventType::find($event->event_type_id); ?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$event->header}}</h1>
            </div>
        
            <div class="col-md-4" style="text-align:right">
                <strong>Vytvorené:</strong> {{$event->created_at}} </br>
                <strong>Naposledy upravené:</strong> {{$event->updated_at}} </br>
                <strong>Čas na vysvetlenie:</strong> {{$event->time_to_explain}} min.</br>
                <strong>Čas na obsluhu:</strong> {{$event->time_to_handle}} min.</br>
                <strong>Typ:</strong> {{$event_type->name}}
            </div>
        </div>

        <div class="row" style="margin-top:30px">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="padding:40px 20px">
                            {!!html_entity_decode($event->message)!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div style="display: flex; align-items: center; justify-content: space-between;margin-bottom: 15px" class="col-md-12">
                <div style="display: flex">
                    <span style="font-size:22px">Nápovedy</span>
                    <div class="help-list" style="margin: 0 15px">
                        @for($i = 0; $i < count($helps); $i++)
                            <button class="btn btn-primary help-btn" data-url="{{ route('events/delete', ['id' => $helps[$i]->id])}}" data-helpname="{{$helps[$i]->name}}" data-helptext="{{$helps[$i]->url}}">
                                {{$i+1}}
                            </button>
                        @endfor
                    </div>
                </div>
                <a href="{{ route('events/createHelp', ['id' => $event->id]) }}">
                    <button class="btn btn-success pull-right">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>

        <?php $options = Event::find($event->id)->option->sortByDesc('correct_answer'); ?>
        @foreach($options as $option)

        <div class="row">
            <div class="col-md-12">
                @if($option->correct_answer == TRUE)
                    <div class="panel panel-success" style="border:3px solid #d6e9c6;">
                @else
                    <div class="panel panel-danger" style="border:3px solid #ebccd1;">
                @endif
                        <div style="padding:20px">
                            {!!html_entity_decode($option->answer_data)!!}
                        </div>
                </div>
            </div>
        </div>

        @endforeach

        @if(Auth::user()->id == $event->author_id)

        <div class="row">
            <div class="col-md-12">
                <a href="/events/edit/{{$event->id}}"><button style="margin-right:10px" class="btn btn-primary pull-left"><i class="far fa-edit"></i> Upraviť</button></a>

                <form class="pull-left" method="POST" action="{{ route('events/delete', $event->id) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" onclick="return confirm('Chcete odstrániť udalosť?')" class="btn btn-danger"><i class="fa fa-trash-alt"></i>&nbsp Odstrániť</button>
                </form>
            </div>
        </div>
            
        @endif

        <div class="row" id="help-row" style="margin-top:30px; display:none">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding-bottom:48px">
						<div class="col-md-8" style="padding:8px 15px">
							<div id="help-name">
							</div>
						</div>
						<div class="col-md-4">
                            <button id="toggle-help-btn" type="button" style="margin-left: 10px" class="btn btn-primary pull-right"><i class="fas fa-eye-slash"></i></button>
                            @if(Auth::user()->user_type_id == 5 || Auth::user()->user_type_id == 6)
                                <a class="btn btn-danger pull-right" href="" id="btn-help"><i class="fa fa-trash-alt"></i>&nbsp Zmazať nápovedu</a>
							@endif
						</div>
                    </div>
                    <div class="panel-body">
                        <div id="help-text" style="padding:0px 20px">
                        </div>
						
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('js/display-help.js') }}"></script>

    </div>
@endsection('content')