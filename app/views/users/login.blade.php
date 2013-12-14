@extends('layouts.master')

@section('main')

{{ Form::open(array('url' => 'users/signin', 'class' => 'form-signin')) }}
	<h2 class="form-signin-heading">Please Login</h2>

	{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username')) }}
	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}

	{{ Form::submit('Login', array('class' => 'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}

@stop