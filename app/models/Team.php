<?php

class Team extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'name' => 'required|unique:teams|between:3,30'
	);

    public function players()
    {
        return $this->hasMany('Player');
    }
}
