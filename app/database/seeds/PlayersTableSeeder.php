<?php

class PlayersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('players')->delete();

		$players = array(
            array(
                'first_name' => 'Iker',
                'last_name' => 'Casillas',
                'team_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Sergio',
                'last_name' => 'Ramos',
                'team_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Karim',
                'last_name' => 'Benzema',
                'team_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Philipp',
                'last_name' => 'Lahm',
                'team_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Javi',
                'last_name' => 'Martínez',
                'team_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Claudio',
                'last_name' => 'Pizarro',
                'team_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Carles',
                'last_name' => 'Puyol',
                'team_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Martín',
                'last_name' => 'Montoya',
                'team_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Daniel',
                'last_name' => 'Alves',
                'team_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Rio',
                'last_name' => 'Ferdinand',
                'team_id' => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Ashley',
                'last_name' => 'Young',
                'team_id' => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'first_name' => 'Wayne',
                'last_name' => 'Rooney',
                'team_id' => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),

		);

		DB::table('players')->insert($players);
	}

}
