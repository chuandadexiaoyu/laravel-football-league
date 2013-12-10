@extends('layouts.scaffold')

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
            {{ Form::input('number', 'team_id', null, array('class' => 'form-control', 'placeholder' => 'team id')) }}
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


