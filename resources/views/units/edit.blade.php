@extends('layouts.app')
@section('title','Úprava vzdelávacej jednotky')
@section('content')
    
    <div  class="container">

        <header><h3>Úprava vzdelávacej jednotky</h3></header>
        <form action="{{ route('units.update', $unit->id) }}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Názov jednotky</label>
                <div>
                    <input id="title" type="text" class="form-control" name="title" value="{{$unit->title}}">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">Popis jednotky</label>
                <div>
                    <textarea class="form-control" name="description" id="description" rows="5" >{{$unit->description}}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('activity_id') ? ' has-error' : '' }}">
                <label for="activities">Vyber vzdelávaciu aktivitu</label>
                <div>
                    <select name="activity_id" id="activities" class="form-control">
                        @foreach($all_activities as $activity)
                            <option value="{{ $activity->id }}"
                                    @if ($activity->id == $unit->activity_id)
                                        selected="selected"
                                    @endif>{{ $activity->title }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('activity_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('activity_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('event_id') ? ' has-error' : '' }}">
                <label for="events">Vyber vzdelávacie udalosti</label>
                <div>
                    <select name="event_id[]" id="events" class="form-control" multiple="multiple">
                        @foreach($all_events as $events)
                            <option value="{{ $events->id }}">{{ $events->header }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('event_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('event_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="buttonSubm1">Ulož vzdelávaciu jednotku</button>
        </form>

    </div>

@endsection('content')


