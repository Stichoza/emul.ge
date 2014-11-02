<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsToEmulsifiers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('emulsifiers', function(Blueprint $table)
		{
			$table->integer('category_id')->after('islam_status')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('risk_group_id')->after('islam_status')->unsigned()->index();
			$table->foreign('risk_group_id')->references('id')->on('risk_groups')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('emulsifiers', function(Blueprint $table)
		{
			$table->dropForeign('emulsifiers_category_id_foreign');
			$table->dropForeign('emulsifiers_risk_group_id_foreign');
			$table->dropColumn('category_id');
			$table->dropColumn('risk_group_id');
		});
	}

}
