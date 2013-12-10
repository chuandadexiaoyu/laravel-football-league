<?php

class Player extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'first_name' => 'required|alpha|between:3,30',
		'last_name' => 'required|alpha|between:3,30',
		'team_id' => 'required|numeric|exists:teams,id'
	);

    //exists:teams,id - team_id pone da go ima v teams tablicata, za da ne garmi teams.index view-to

    // Izpolzvam i relaciite na Eloquent ORM-a
    public function team()
    {
        return $this->belongsTo('Team');
    }

}
