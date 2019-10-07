<!--
| Created by Bernad on 11/6/2017.
-->

@extends('layouts.app')

<head>
    <title>Vytvorenie udalostí</title>
    <!--
    | It is possible to add here JS for CK editor from server like this:
    | <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    -->
</head>

@section('content')
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

                <header><h3>Vytvorenie udalosti</h3></header>

                <form method="post" id="formID1">

                <div class="form-group">
                    <label for="new-header">Názov udalosti</label>
                    <input class="form-control" name="header" id="new-header"  value="{{ old('header') }}"></input>
                </div>
                    <div class="form-group" style="padding:1px">
                        <textarea class="form-control" name="message" id="new-event" rows="5"
                                  placeholder="Tvoja udalosť" style="display:none;">
                        </textarea>
                    </div>
                    <div class="btn-group" name="radioboxes" data-toggle="buttons">
                        <!--
                        | Every single input has its own id, this id is mapped to seed EventTypesSeeder
                        | order of event_types table in database on DB event type ID order
                        -->
                        <label class="btn btn-default">
                            <input type="radio" name="input[]" value="Polytomická" id="1">Polytomická
                        </label>
                        <label class="btn btn-default active">
                            <input type="radio" name="input[]" value="Dichotomická" id="2" checked>Dichotomická
                        </label>
                    </div>
                <div class="form-group">
                    <label for="new_time_to_handle">Odhadovaný čas pre obsluhu udalosti [minúty]</label>
                    <input type="number" class="form-control" name="time_to_handle" id="new_time_to_handle" ></input>

                    <label for="new_time_to_explain">Odhadovaný čas potrebný na vysvetlenie [minúty]</label>
                    <input type="number" class="form-control" name="time_to_explain" id="new_time_to_explain" ></input>
                </div>
                    <div id="myDIV" class="header">
                        <h4 style="margin:5px">Možnosti</h4>
                        <div class="panel panel-default" style="padding:20px">
                            <ul id="myUL" style="list-style:none;padding-left:0px">
                            <!--
                            | here will JS dynamically generate data
                            -->
                            </ul>
                        </div>
                        <button type="button" class="btn btn-default" id="newOptionId" onclick="newOption()" ><i class="fa fa-plus" aria-hidden="true"></i> Pridaj novú možnosť</button>
                        <button type="submit" class="btn btn-primary" id="buttonSubm1">Vytvoriť udalosť</button>
                    </div>
                <!-- <ul id="myUL" style="list-style-type:none; padding-left:0px"> -->
                    <!-- here will go data generated with JS -->
                <!-- </ul> -->
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                    <script>localStorage.setItem("numChecked",0)</script>
                    <script src="{{ URL::asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/new-event.js') }}"></script>
                </form>
            </div>
        </section>
</div>
@endsection('content')



