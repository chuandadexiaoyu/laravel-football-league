<?php

class GamesController extends BaseController {

	protected $game;

    protected $team;

	public function __construct(Game $game, Team $team)
	{
		$this->game = $game;
        $this->team = $team;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$games = $this->game->all();
        $teams = $this->team->all();

        if  ($this->team->count() % 4 != 0)
        {
            return Redirect::route('teams.index')
                ->with('message', 'Teams must be divided by 4 (4, 8, 16, 32, 40) for the purpose of tournament');
        }

        foreach ($teams as $team) {

        }


        return View::make('games.index', compact('games', 'teams'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('games.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Game::$rules);

		if ($validation->passes())
		{
			$this->game->create($input);

			return Redirect::route('games.index');
		}

		return Redirect::route('games.create')
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
		$game = $this->game->find($id);

		if (is_null($game))
		{
			return Redirect::route('games.index');
		}

		return View::make('games.edit', compact('game'));
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
		$validation = Validator::make($input, Game::$rules);

		if ($validation->passes())
		{
            $game = $this->game->find($id);
            $game->update($input);

			return Redirect::route('games.index');
		}

		return Redirect::route('games.edit', $id)
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
		$this->game->find($id)->delete();

		return Redirect::route('games.index');
	}

}
