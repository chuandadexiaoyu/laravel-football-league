@extends('layouts.scaffold')

@section('main')


{{ Form::open(array('route' => 'teams.store', 'class' => 'form-signin')) }}
    <h1>Create Team</h1>
	<ul>
        <li>
            {{ Form::text('name', 'Name', array('class' => 'form-control')) }}
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


