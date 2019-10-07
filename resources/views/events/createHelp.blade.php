<?php

use App\Event;

?>

@extends('layouts.app')
@section('title','Vytvorenie nápovedy')
@section('content')

    <div class="container">
        <section class="row new-post">
            <div class="col-md-12">
                <header><h3>Vytvorenie nápovedy</h3></header>

                <form method="post" id="formID1" action="{{ route('events/storeHelp', $event_id) }}">
                    <div class="form-group">
                        <label for="new-help">Názov nápovedy</label>
                        <input type="text" placeholder="Sem zadajte názov nápovedy..." class="form-control" name="help" id="new-help" minlength="5" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="new-helpUrl">Text k nápovede</label>
                        <textarea type="text" placeholder="Sem zadajte text nápovedy..." class="form-control" name="helpUrl" id="new-helpUrl"  minlength="20" maxlength="2000" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="buttonSubm1">Vytvoriť nápovedu</button>

                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                    <script>localStorage.setItem("numChecked",0)</script>
                    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                    <script type="text/javascript" src="{{ URL::asset('js/new-event.js') }}"></script>
                </form>
            </div>
        </section>
    </div>
@endsection('content')

