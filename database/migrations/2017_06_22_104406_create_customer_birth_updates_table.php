<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerBirthUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_birth_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('date_of_birth')->nullable();
            $table->string('time_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('date_month')->nullable();
            $table->longtext('customer_remarks')->nullable();
            $table->longtext('admin_remarks')->nullable();
            $table->string('count')->nullable();
            $table->enum('status',['pending','accepted','rejected']);

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
        Schema::dropIfExists('customer_birth_updates');
    }
}
