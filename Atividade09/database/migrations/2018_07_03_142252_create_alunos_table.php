<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlunosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alunos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 80);
			$table->string('rua', 80);
			$table->string('numero', 10);
			$table->string('bairro', 80);
			$table->integer('cidade_id')->index('cidade_id');
			$table->string('cep', 8);
			$table->string('mail', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alunos');
	}

}
