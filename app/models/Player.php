<?php

class Player extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'first_name' => 'required|alpha|between:3,30',
		'last_name' => 'required|alpha|between:3,30',
		'team_id' => 'required|numeric|exists:teams,id'
	);

    public function team()
    {
        return $this->belongsTo('Team');
    }

}
