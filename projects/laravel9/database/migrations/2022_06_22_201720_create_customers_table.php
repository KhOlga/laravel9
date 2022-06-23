<?php

use App\Models\Customer;
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
        Schema::create('customers', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('token')->unique()->nullable();
			$table->integer('discount_level')->default(config('discounts.levels.first'));
			$table->integer()->default(Customer::STATUS_NEW);
			$table->timestamps();
			$table->softDeletes();

			$table->index(['email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
