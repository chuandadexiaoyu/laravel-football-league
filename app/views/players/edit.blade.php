@extends('layouts.master')

@section('main')
{{ Form::model($player, array('method' => 'PATCH', 'route' => array('players.update', $player->id), 'class' => 'form-signin')) }}
    <h1>Edit Player</h1>
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('players.show', 'Cancel', $player->id, array('class' => 'btn btn-default')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
