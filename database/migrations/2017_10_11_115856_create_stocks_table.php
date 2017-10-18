<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration {

	public function up()
	{
		Schema::create('stocks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('budget_id')->unsigned();
			$table->string('name');
			$table->integer('amount');
			$table->boolean('cost')->default(false);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Stocks');
	}
}