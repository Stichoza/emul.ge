<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmulsifiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emulsifiers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('number')->index();
			$table->char('index', 1)->index()->nullable();
			$table->string('name')->index();
			$table->string('name_q')->index();
			$table->text('description');
			$table->boolean('vegetarian_safe')->nullable();
			$table->boolean('vegean_safe')->nullable();
			$table->boolean('fasting_safe')->nullable();
			$table->boolean('prohibited_local')->nullable();
			$table->boolean('prohibited_global')->nullable();
			$table->enum('islam_status', ['halal', 'mashbooh', 'haram'])->nullable();
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
		Schema::drop('emulsifiers');
	}

}
