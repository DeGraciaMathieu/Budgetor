<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('expenses', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->foreign('budget_id')->references('id')->on('budgets')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('stocks', function(Blueprint $table) {
			$table->foreign('budget_id')->references('id')->on('budgets')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('earnings', function(Blueprint $table) {
			$table->foreign('budget_id')->references('id')->on('budgets')
						->onDelete('restrict')
						->onUpdate('restrict');
		});		
	}

	public function down()
	{
		Schema::table('expenses', function(Blueprint $table) {
			$table->dropForeign('expenses_category_id_foreign');
		});
		Schema::table('categories', function(Blueprint $table) {
			$table->dropForeign('categories_budget_id_foreign');
		});
		Schema::table('stocks', function(Blueprint $table) {
			$table->dropForeign('stocks_budget_id_foreign');
		});
		Schema::table('earnings', function(Blueprint $table) {
			$table->dropForeign('earnings_budget_id_foreign');
		});		
	}
}