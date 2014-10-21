<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		    Schema::create('users', function($tabla) 
        {
             $tabla->increments('id');
            $tabla->string('username', 50);
            $tabla->string('email', 100)->unique();
            $tabla->string('gender', 100);
            $tabla->string('link', 1000);
            $tabla->string('photo',1000);
            $tabla->string('password', 200);
            $tabla->string('remember_token',100);
            $tabla->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
