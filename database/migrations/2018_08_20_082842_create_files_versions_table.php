<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files_versions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('file_id')->nullable();
			$table->integer('date_created')->nullable();
			$table->text('content', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('files_versions');
	}

}
