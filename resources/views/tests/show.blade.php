@extends('layouts.app')
@section('title','Informatívne testovanie')
@section('content')
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">
    <div style="margin-left: 10px;margin-right:10px">
        <div class="container">
            <div class="row">
                <h1>Informatívne testovanie</h1>
            </div>
            <div class="row search-form">
            <form method="POST" action="{{ route("tests/search") }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label for="searchTerm">Vyhľadaj test podľa názvu</label>
                        <div style="display: flex;justify-content: center;margin-bottom: 20px">
                            <input type="text" name="searchTerm" class="form-control" placeholder="Názov testu" value="{{ old('searchTerm') }}">
                            <button class="btn btn-success" style="margin-left: 10px">Hľadaj</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>

            <div class="row">
                <?php
                use Jenssegers\Agent\Agent;
                $agent = new Agent();
                ?>
                @include('tests.table', ['agent' => $agent])
            </div>
        </div>
    </div>

@endsection
