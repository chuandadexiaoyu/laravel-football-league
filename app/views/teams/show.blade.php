@extends('layouts.scaffold')

@section('main')

<h1>Show Team</h1>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $team->name }}}</td>
                    <td>{{ link_to_route('teams.edit', 'Edit', array($team->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('teams.destroy', $team->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

<p>{{ link_to_route('teams.index', 'Return to all teams', null, array('class' => 'btn btn-warning')) }}</p>

@stop
