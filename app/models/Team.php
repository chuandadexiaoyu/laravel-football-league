<?php

class Team extends Eloquent {

/*
 *  Mnogo qki pravila za validaciq, pesti dosta vreme, vupreki che ima podobni v kohana
 *
 *  http://laravel.com/docs/validation
 *
 * nqma da pravq podrobna validaciq - bi trqbvalo da proverq za vida na simvolite
 *
 * ima i regex
 *
 */
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required|unique:teams|between:3,30'
	);

    public function players()
    {
        return $this->hasMany('Player');
    }
}
