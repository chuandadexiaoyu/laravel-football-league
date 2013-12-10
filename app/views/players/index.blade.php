@extends('layouts.scaffold')

@section('main')

<h1>All Players</h1>

@if ($players->count())
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>First_name</th>
				<th>Last_name</th>
				<th>Team_id</th>
                <th>Edit</th>
                <th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($players as $player)
				<tr>
					<td>{{{ $player->first_name }}}</td>
					<td>{{{ $player->last_name }}}</td>
					<td>{{{ $player->team_id }}}</td>
                    <td>{{ link_to_route('players.edit', 'Edit', array($player->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('players.destroy', $player->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no players
@endif

<p>{{ link_to_route('players.create', 'Add new player', null, array('class' => 'btn btn-primary')) }}</p>

@stop
