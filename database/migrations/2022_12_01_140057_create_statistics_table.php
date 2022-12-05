<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('statistics', function (Blueprint $table) {
			$table->id();
			$table->string('code');
			$table->json('name');
			$table->unsignedBigInteger('confirmed');
			$table->unsignedBigInteger('deaths');
			$table->unsignedBigInteger('recovered');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('statistics');
	}
};
