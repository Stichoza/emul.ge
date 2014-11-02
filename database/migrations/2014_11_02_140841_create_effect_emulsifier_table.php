<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEffectEmulsifierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('effect_emulsifier', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('effect_id')->unsigned()->index();
			$table->foreign('effect_id')->references('id')->on('effects')->onDelete('cascade');
			$table->integer('emulsifier_id')->unsigned()->index();
			$table->foreign('emulsifier_id')->references('id')->on('emulsifiers')->onDelete('cascade');
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
		Schema::drop('effect_emulsifier');
	}

}
