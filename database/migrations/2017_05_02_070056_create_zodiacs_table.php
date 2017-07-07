<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZodiacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zodiacs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('zodiac_description')->nullable();
            $table->string('gemstone_name')->nullable();
            $table->text('gemstone_description')->nullable();
            $table->string('carat')->nullable();
            $table->enum('lucky_number',[1,2,3,4,5,6,7,8,9]);
            $table->enum('lucky_color',['red', 'white', 'green', 'yellow', 'grey', 'purple', 'black', 'purple_and_black', 'red_and_grey']);
            $table->text('color_description')->nullable();
            $table->text('traits')->nullable();
            $table->string('compatible_zodiacs');
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
        Schema::dropIfExists('zodiacs');
    }
}
