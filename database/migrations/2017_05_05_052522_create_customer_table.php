<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->enum('gender',['male','female','unspecified'])->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('time_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->integer('zodiac_id')->unsigned()->nullable();
            $table->foreign('zodiac_id')->references('id')->on('zodiacs');
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('fb_id');
            $table->string('fb_username');
            $table->string('token');
            
            $table->rememberToken();
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
        //
        Schema::dropIfExists('customers');

    }
}
