@extends('layouts.master')

@section('main')

<h1>All Teams</h1>

@if ($teams->count())
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($teams as $team)
				<tr>
					<td>{{{ $team->name }}}</td>
                    <td>{{ link_to_route('teams.edit', 'Edit', array($team->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('teams.destroy', $team->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no teams
@endif

<p>{{ link_to_route('teams.create', 'Add new team', null, array('class' => 'btn btn-primary')) }}</p>

@stop
