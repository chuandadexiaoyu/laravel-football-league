<?php
use Baum\Node;

class Game extends Node {
	protected $guarded = array();

	public static $rules = array(
		'host_team_id' => 'required',
		'guest_team_id' => 'required',
		'host_score' => 'required',
		'guest_score' => 'required',
		'time' => 'required'
	);
}
