@extends('layouts.scaffold')

@section('main')

<h1>Show Player</h1>

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
	</tbody>
</table>

<p>{{ link_to_route('players.index', 'Return to all players', null, array('class' => 'btn btn-warning')) }}</p>

@stop
