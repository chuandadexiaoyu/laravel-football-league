<?php

class PlayersController extends BaseController {

	/**
	 * Player Repository
	 *
	 * @var Player
	 */
	protected $player;

	public function __construct(Player $player)
	{
		$this->player = $player;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$players = $this->player->all();

		return View::make('players.index', compact('players'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('players.create');
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$player = $this->player->findOrFail($id);

		return View::make('players.show', compact('player'));
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

		if (is_null($player))
		{
			return Redirect::route('players.index');
		}

		return View::make('players.edit', compact('player'));
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

			return Redirect::route('players.show', $id);
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
