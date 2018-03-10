<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIKKabupatenKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('ik_kabupaten_kotas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('label', 255);
			$table->string('description', 255)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::drop('ik_kabupaten_kotas');
	}
}
