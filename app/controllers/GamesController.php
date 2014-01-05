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
	 * Store a games with teams id's into database.
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

        // validate if team count is 2^x series. Finds x and check if it's a natural number
        $x = log($this->team->count()) / log(2);
        if ($x != floor($x))
        {
            return Redirect::route('teams.index')
                ->with('message', 'Teams must be 2^x (like: 4, 8, 16, 32 ...) for the purpose of tournament');
        }

        DB::table('games')->delete();

        $nodes = array();

        // until depth is smaller than x from 2^x series, populates the nested set
        for ($depth = 0; $depth < $x; $depth++)
        {
            if ($depth == 0)
            {
                //TODO set time intervals - game(15 + 10 + 15) + break(10) = 50min, 8 teams / day = 400min
                // generate root element = the final game
                $nodes[] = Game::create(array('time' => '2013-12-12 20:00:00'));
            }
            else
            {
                // using $temp array because of resetting $nodes array at every loop
                $temp = array();
                foreach ($nodes as $key => $value)
                {
                    if ($depth != $x - 1)
                    {
                        // add 2 children for every other node
                        $temp[] = $value->children()->create(array('time' => '2013-12-12 20:00:00'));
                        $temp[] = $value->children()->create(array('time' => '2013-12-12 20:00:00'));
                    }
                    else
                    {
                        // insert teams into leaf nodes
                        $i = $key * 4; // in every loop $i is four times bigger - pattern (0, 4, 8, 12)

                        $temp[] = $value->children()->create(array(
                            'host_team_id' => $teams[$i]->id,
                            'guest_team_id' => $teams[$i + 1]->id,
                            'time' => '2010-12-12 20:00:00'
                        ));

                        $temp[] = $value->children()->create(array(
                            'host_team_id' => $teams[$i + 2]->id,
                            'guest_team_id' => $teams[$i + 3]->id,
                            'time' => '2010-12-12 20:00:00'
                        ));
                    }
                }
                $nodes = $temp;
            }
        }

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
