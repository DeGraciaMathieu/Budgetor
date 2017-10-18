<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration {

	public function up()
	{
		Schema::create('expenses', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->text('name');
			$table->integer('amount');
			$table->text('comment')->nullable();
			$table->timestamp('paid_at');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('expenses');
	}
}