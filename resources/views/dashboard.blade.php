@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container">
	@if(Auth::user()->user_type_id === 5)
	<div class="row">
		<div class="col-md-12">
			@include('activities.table', ['activities' => $non_validated_activities, 'agent' => $agent, 'title' => $non_validated_title])
		</div>
	</div>
	@endif

	<div class="row">
		<div class="col-md-12">
			@include('activities.table', ['activities' => $all_activities, 'agent' => $agent, 'title' => $all_title])
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			@include('activities.table', ['activities' => $reg_activities, 'agent' => $agent, 'title' => $reg_title])
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			@include('events.table', ['all_events' => $all_events], ['title' => $events_title])
		</div>
	</div>
</div>
@endsection

