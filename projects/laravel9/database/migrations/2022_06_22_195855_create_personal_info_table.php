<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('personable_id');
			$table->string('personable_type');
			$table->string('country')->nullable();
			$table->string('city')->nullable();
			$table->string('street')->nullable();
			$table->string('postal_code')->nullable();
			$table->string('phone')->nullable();
			$table->year('birth_year')->nullable();

			//TODO: add fields
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_info');
    }
};
