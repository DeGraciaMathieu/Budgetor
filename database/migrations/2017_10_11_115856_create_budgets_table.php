<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBudgetsTable extends Migration {

	public function up()
	{
		Schema::create('budgets', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name');
			$table->timestamp('started_at');
			$table->timestamp('ended_at');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('budgets');
	}
}