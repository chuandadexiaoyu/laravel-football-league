@extends('layouts.master')

@section('main')

{{ Form::open(array('route' => 'players.store', 'class' => 'form-signin')) }}
    <h1>Create Player</h1>
	<ul>
        <li>
            {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
        </li>

        <li>
            {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
        </li>

        <li>
            {{ Form::select('team_id', $options); }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('players.index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
