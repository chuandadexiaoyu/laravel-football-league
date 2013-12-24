<?php

class PlayersController extends BaseController {

	protected $player;

    protected $team;

	public function __construct(Player $player, Team $team)
	{
		$this->player = $player;
        $this->team = $team;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$players = $this->player->all();
        $teams = $this->team->all();

		return View::make('players.index', compact('players', 'teams'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $teams = $this->team->all();

        foreach ($teams as $team) {
            $options[$team->id]= $team->name;
        }

        //handle case when no teams are set, otherwise - Undefined variable: options
        if (!isset($options))
        {
            return Redirect::route('players.index')
                ->with('message', 'Please set some teams first.');
        }

		return View::make('players.create', compact('options'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Player::$rules);

		if ($validation->passes())
		{
			$this->player->create($input);

			return Redirect::route('players.index');
		}

		return Redirect::route('players.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$player = $this->player->find($id);
        $teams = $this->team->all();

        if ($teams->isEmpty())
        {
            return Redirect::route('players.index')
                ->with('message', 'Please set some teams first.');
        }

        foreach ($teams as $team) {
            $options[$team->id]= $team->name;
        }

        if (is_null($player))
		{
			return Redirect::route('players.index');
		}

		return View::make('players.edit', compact('player', 'options'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Player::$rules);

		if ($validation->passes())
		{
			$player = $this->player->find($id);
			$player->update($input);

			return Redirect::route('players.index');
		}

		return Redirect::route('players.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->player->find($id)->delete();

		return Redirect::route('players.index');
	}

}
