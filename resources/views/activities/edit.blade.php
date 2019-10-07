@extends('layouts.app')

@section('title','Úprava aktivity')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Úprava vzdelávacej aktivity</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('activities.update', $activity->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Názov aktivity</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $activity->title }}" required autofocus>

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
                                    <textarea id="content" class="form-control hidden" name="content" required>{{ $activity->content }}</textarea>

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
                                            <input id="public" type="checkbox" value='0' name="public" {{ $activity->public ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('id_study_field') ? ' has-error' : '' }}">
                                <label for="id_study_field" class="col-md-4 control-label">Názov študijného odboru</label>

                                <div class="col-md-6">
                                    <select name="id_study_field" id="id_study_field" class="form-control">
                                        @foreach(App\StudyField::all() as $sf)
                                            <option value="{{ $sf->id }}" @if ($sf->id == $activity->id_study_field) selected @endif>{{ $sf->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('id_study_field'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_study_field') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upraviť vzdelávaciu aktivitu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/edit-activity.js') }}"></script>

@endsection
