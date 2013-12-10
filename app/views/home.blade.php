@extends('layouts.master')

@section('main')
<form method="post" action="" class="form-signin">
    <h1>Manager Login</h1>
    <!-- CSRF Token -->
    <input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}"/>

    <!-- Email -->
    <div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <input type="text" name="email" id="email" value="{{{ Input::old('email') }}}" class="form-control"/>
            {{{ $errors->first('email') }}}
        </div>
    </div>
    <!-- ./ email -->

    <!-- Password -->
    <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" name="password" id="password" value=""  class="form-control"/>
            {{{ $errors->first('password') }}}
        </div>
    </div>
    <!-- ./ password -->

    <!-- Login button -->
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
        </div>
    </div>
    <!-- ./ login button -->
</form>
@stop