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
        Schema::create('metadata', function (Blueprint $table) {
			$table->unsignedBigInteger('retrievable_id');
			$table->string('retrievable_type');
			$table->string('url')->nullable();
			$table->string('host')->nullable();
			$table->string('user_agent')->nullable();
			$table->string('referrer')->nullable();
			$table->string('country')->nullable();
			$table->string('locale')->nullable();
			$table->string('google_id')->nullable();
			$table->timestamp('created_at')->nullable();

			$table->index(['retrievable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metadata');
    }
};
