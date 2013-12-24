<?php

class Game extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'host_team_id' => 'required',
		'guest_team_id' => 'required',
		'host_score' => 'required',
		'guest_score' => 'required',
		'time' => 'required'
	);
}
