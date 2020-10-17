<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('results', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('question_id');
			$table->unsignedBigInteger('quiz_id');
			$table->unsignedBigInteger('answer_id');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('question_id')->references('id')->on('questions');
			$table->foreign('quiz_id')->references('id')->on('quizzes');
			$table->foreign('answer_id')->references('id')->on('answers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('results');
	}
}
