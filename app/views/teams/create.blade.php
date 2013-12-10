@extends('layouts.master')

@section('main')

{{ Form::open(array('route' => 'teams.store', 'class' => 'form-signin')) }}
    <h1>Create Team</h1>
	<ul>
        <li>
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Team Name')) }}
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


