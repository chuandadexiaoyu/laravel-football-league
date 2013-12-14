@extends('layouts.master')

@section('main')

{{ Form::open(array('url' => 'users/create', 'class' => 'form-signin')) }}
	<h2 class="form-signup-heading">Please Register</h2>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

	{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username')) }}
	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
	{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}

	{{ Form::submit('Register', array('class' => 'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}

@stop