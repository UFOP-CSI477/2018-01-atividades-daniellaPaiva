<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlunosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alunos', function(Blueprint $table)
		{
			$table->foreign('cidade_id', 'alunos_ibfk_1')->references('id')->on('cidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alunos', function(Blueprint $table)
		{
			$table->dropForeign('alunos_ibfk_1');
		});
	}

}
