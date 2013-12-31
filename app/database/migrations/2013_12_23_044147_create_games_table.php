<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table) {
			$table->increments('id');

            $table->integer('parent_id')->nullable();
            $table->integer('lft')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('depth')->nullable();

			$table->string('host_team_id')->nullable();
			$table->string('guest_team_id')->nullable();
			$table->integer('host_score')->default(0);
			$table->integer('guest_score')->default(0);
			$table->dateTime('time');
			$table->timestamps();

            $table->index('parent_id');
            $table->index('lft');
            $table->index('rgt');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('games');
	}

}
