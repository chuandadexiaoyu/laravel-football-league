<?php

class Player extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'first_name' => 'required|alpha|between:3,30',
		'last_name' => 'required|alpha|between:3,30',
		'team_id' => 'required|numeric|between:1,3'
	);

    // Izpolzvam i relaciite na Eloquent ORM-a

    public function team()
    {
        return $this->belongsTo('Team');
    }

}
