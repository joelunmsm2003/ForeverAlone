<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table)
    {
        $table->increments('id');
        $table->integer('user_id');
         $table->string('caracteristica');
        $table->string('tipo');
        $table->string('deseo', 1000);
        $table->string('imagen', 1000);
        $table->string('imagen_1', 1000);
        $table->string('imagen_2', 1000);
        $table->string('imagen_3', 1000);
       
    
        $table->timestamps();
    });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("products");
	}

}
