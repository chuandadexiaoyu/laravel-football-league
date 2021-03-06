@extends('layouts.master')

@section('main')

<h1>All Games</h1>

@if ($games->count())
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Host Team</th>
                <th>Score</th>
				<th>Guest Team</th>
				<th>Time</th>
                <th>Edit</th>
                <th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($games as $game)
				<tr>
					<td>{{{ $teams->find($game->host_team_id)->name }}}</td>
                    <td>{{{ $game->host_score }}} : {{{ $game->guest_score }}}</td>
					<td>{{{ $teams->find($game->guest_team_id)->name }}}</td>
					<td>{{{ $game->time }}}</td>
                    <td>{{ link_to_route('games.edit', 'Edit', array($game->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('games.destroy', $game->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no games
@endif

@stop
