<?php

use App\Option;
use App\EventType;
use App\Event;



?>

@extends('layouts.app')
@section('title','Úprava možnosti2')

@section('content')

<div class="container">

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">

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



            <header>
                <h3>
                    Úprava možnosti
                </h3>
            </header>

            <form name="optionform" method="post" id="formID1" action="{{  route('events/option/save', [$option->id] ) }}" style="padding-left:1px">

                <textarea class="form-control" name="data" id="data" rows="2" placeholder="Odpoveď">{{$option->answer_data}}</textarea>

                <div class="row" style="margin-top:25px">
                    <div class="col-md-12">
                        @if($option->correct_answer == TRUE)
                            <input name="checkbox" type="checkbox" name="correct" checked> Správna
                        @else
                            <input name="checkbox" type="checkbox" name="correct"> Správna
                                @endif

                        <button type="submit" class="btn btn-primary" id="buttonSubm1" onclick="return CheckForm()">Uložiť</button>
                    </div>
                </div>

            </form>

            <div class="row" style="margin-top:25px">
                <div class="col-md-12">
                    <form class="pull-right" method="POST" action="{{ route('events/options/delete', $option->id) }}">
                        {{ method_field('DELETE') }}

                        <button type="submit" onclick="return confirm('Chcete odstrániť túto možnosť?')" class="btn btn-danger">Odstrániť</button>
                    </form>
                </div>
            </div>

        </div>

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            setTimeout(function() {
                CKEDITOR.replace(data);

            },0);
        </script>


        <script>
            function CheckForm()
            {
                if (CKEDITOR.instances['data'].getData() == ""){
                    alert("Chyba. Text moznosti nesmie zostať prázdny.");
                    return false;
                }

            }

        </script>

</div>
@endsection('content')



