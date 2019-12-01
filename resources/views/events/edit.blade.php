<!--
| Created by Volko 2017.
-->

<?php

use App\Option;
use App\EventType;
use App\Event;



?>

@extends('layouts.app')

<head>
    <title>Úprava udalostí</title>

</head>


@section('content')
<body id="grad1">

<div class="container">


    <section class="row new-post">
        <div class="col-md-12">

            @if ($errors->any())

                <div align="center">
                    <table class="table">
                        <tbody>
                        <tr class="danger">
                            <td>{{ implode('', $errors->all(':message')) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endif


            <header><h3>Uprav udalosť</h3></header>
            <form method="post" id="formID1">


                <div class="form-group">
                    <textarea class="form-control" name="header" id="new-header" rows="2" placeholder="Hlavička udalosti" value="{{ old('header') }}">{{$event->header}}</textarea>
                </div>

                <div class="form-group" style="padding:1px">
                    <textarea class="form-control" name="message" id="new-event" rows="5" placeholder="Tvoja udalosť" style="display:none;">{{$event->message}}</textarea>
                </div>
                <?php $options = Event::find($event->id)->option; ?>


                <?php $event_type = EventType::find($event->event_type_id); ?>


                <div class="btn-group" name="radioboxes" data-toggle="buttons">
                    <!-- Every single input has its own id, this id is mapped to seed EventTypesSeeder
                order of event_types table in database on DB event type ID order-->


                    @if($event_type->id==1)
                        <label class="btn btn-default active" >
                            <input type="radio" name="input[]" value="Polytomická" id="1" checked="checked">Polytomická
                        </label>
                    @else  <label class="btn btn-default" >
                        <input type="radio" name="input[]" value="Polytomická" id="1">Polytomická
                    </label>
                    @endif
                    @if($event_type->id==2)
                        <label class="btn btn-default active">
                            <input type="radio" name="input[]" value="Dichotomická" id="2" checked="checked">Dichotomická
                        </label>
                    @else <label class="btn btn-default" >
                        <input type="radio" name="input[]" value="Dichotomická" id="2">Dichotomická
                    </label>
                    @endif

                </div>

                <div class="form-group">
                    <h4 style="margin:5px">Odhadovaný čas pre obsluhu udalosti [minúty]</h4>
                    <textarea class="form-control" name="time_to_handle" id="new_time_to_handle" rows="1" placeholder="time_to_handle_integer_number">{{$event->time_to_handle}}</textarea>

                    <h4 style="margin:5px">Odhadovaný čas potrebný na vysvetlenie [minúty]</h4>
                    <textarea class="form-control" name="time_to_explain" id="new_time_to_explain" rows="1" placeholder="time_to_explain_integer_number">{{$event->time_to_explain}}</textarea>
                </div>


                <div id="myDIV" class="header">
                    <div class="panel panel-default" style="padding:20px">
                        <h4 style="margin:5px">Možnosti</h4></br>

                        <?php
                            $options = Event::find($event->id)->option;
                            $rights=0
                        ?>

                        @foreach($options as $option)
                            <div style="padding-bottom:30px">
                                @if($option->correct_answer == TRUE)
                                <div class="panel panel-success" style="border:3px solid #d6e9c6;padding:20px">
                                <?php $rights++ ?>
                                @else
                                <div class="panel panel-danger" style="border:3px solid #ebccd1;padding:20px">
                                @endif



                                    <div>
                                        {!!html_entity_decode($option->answer_data)!!}
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="buttonSubm1" type="submit" class="btn btn-primary"  formaction="{{ route('events/option', [$option->id]) }}">Upraviť</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="button" class="btn btn-default" id="newOptionId" onclick="newOption()" ><i class="fa fa-plus" aria-hidden="true"></i> Pridaj novú možnosť</button>
                    </div>

                </div>


                <ul id="myUL" style="list-style:none;padding-left:0px">
                    <!-- here will go data generated with JS -->
                </ul>

                <input type="hidden" value="{{ Session::token() }}" name="_token">

                <button id="buttonSubm1" type="submit" class="btn btn-primary"  onclick="checkFormular()" formaction="{{ route('events/edit', $event->id) }}">Uložiť udalosť</button>




            </form>

                <script>

                    localStorage.setItem("numChecked", {{$rights}}+"");

                    var rights = localStorage.getItem("numChecked");

                    if (rights == null || rights == "" || rights == 0 ){
                        localStorage.setItem("numChecked", 0);
                    }

                </script>
                <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>


        </div>
    </section>




</div>


<script type="text/javascript" src="{{ URL::asset('js/new-event.js') }}"></script>


</body>
@endsection('content')



