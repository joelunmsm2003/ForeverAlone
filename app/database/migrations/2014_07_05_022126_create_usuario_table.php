<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
public function up()
{
    Schema::create('users1', function($table)
    {
        $table->increments('id');
        $table->string('email')->unique();
        $table->string('name');
        $table->string('password');
        $table->string('remember_token',100);
        $table->timestamps();
        
    });
}

public function down()
{
    Schema::drop('users1');
}

}
