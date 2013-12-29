<?php

class TeamsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('teams')->delete();

		$teams = array(
            array(
                'name' => 'Real Madrid',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name' => 'Bayern München',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name' => 'Barcelona',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name' => 'Manchester United',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),

		);

		DB::table('teams')->insert($teams);
	}

}
