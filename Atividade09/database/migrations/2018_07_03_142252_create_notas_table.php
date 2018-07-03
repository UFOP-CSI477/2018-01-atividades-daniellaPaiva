<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notas', function(Blueprint $table)
		{
			$table->smallInteger('ano');
			$table->smallInteger('semestre');
			$table->integer('aluno_id')->index('aluno_id');
			$table->decimal('nota1', 5)->nullable();
			$table->decimal('nota2', 5)->nullable();
			$table->decimal('nota3', 5)->nullable();
			$table->boolean('aprovado')->nullable();
			$table->primary(['ano','semestre','aluno_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notas');
	}

}
