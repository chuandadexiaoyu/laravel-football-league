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

        return View::make('games.index', compact('games', 'teams'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $teams = $this->team->all();

        if ($teams->isEmpty())
        {
            return Redirect::route('teams.index')
                ->with('message', 'Please set some teams first.');
        }

        // validate if team count is 2^x
        $valid_teams = log($this->team->count()) / log(2);
        if ($valid_teams != floor($valid_teams))
        {
            return Redirect::route('teams.index')
                ->with('message', 'Teams must be 2^n (like: 4, 8, 16, 32 ...) for the purpose of tournament');
        }

        DB::table('games')->delete();

        $root = Game::create(array('time' => '2013-12-29 19:59:33'));

//        while ($root->getLeaves()->count() <= $teams->count())
//        {
//
//        }

        return Redirect::route('games.index');
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
