@extends('layouts.master')

@section('main')

<h1>Create Game</h1>

{{ Form::open(array('route' => 'games.store')) }}
	<ul>
        <li>
            {{ Form::label('host_team_id', 'Host_team_id:') }}
            {{ Form::text('host_team_id') }}
        </li>

        <li>
            {{ Form::label('guest_team_id', 'Guest_team_id:') }}
            {{ Form::text('guest_team_id') }}
        </li>

        <li>
            {{ Form::label('host_score', 'Host_score:') }}
            {{ Form::input('number', 'host_score') }}
        </li>

        <li>
            {{ Form::label('guest_score', 'Guest_score:') }}
            {{ Form::input('number', 'guest_score') }}
        </li>

        <li>
            {{ Form::label('time', 'Time:') }}
            {{ Form::text('time') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


