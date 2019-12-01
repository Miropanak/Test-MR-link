@extends('layouts.app')

@section('title','Vytvorenie aktivity')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Vytvorenie vzdelávacej aktivity</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('activity/create') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Názov aktivity</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">Obsah</label>

                                <div class="col-md-6">
                                    <textarea id="content" class="form-control hidden" name="content" required></textarea>

                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="public" class="col-md-4 control-label">Verejná aktivita</label>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input id="public" type="checkbox" value='0' name="public" {{ old('public') ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('study_field_id') ? ' has-error' : '' }}">
                                <label for="study_field_id" class="col-md-4 control-label">Názov študijného odboru</label>

                                <div class="col-md-6">
                                    <select name="study_field_id" id="study_field_id" class="form-control">
                                        @foreach(App\StudyField::all() as $sf)
                                            <option value="{{ $sf->id }}">{{ $sf->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('study_field_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('study_field_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Vytvoriť vzdelávaciu aktivitu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        

    </div>

    <script src="{{ URL::asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/edit-activity.js') }}"></script>

@endsection
