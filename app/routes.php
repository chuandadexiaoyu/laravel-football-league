<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('teams');
});

Route::controller('users', 'UsersController');

Route::group(array('before' => 'auth'), function()
{
    Route::resource('teams', 'TeamsController', array('except' => array('show')));

    Route::resource('players', 'PlayersController', array('except' => array('show')));

    Route::resource('games', 'GamesController', array('except' => array('create', 'show')));
});
