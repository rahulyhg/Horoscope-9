<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoroscopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horoscopes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('for_date');
            $table->longText('mesha');
            $table->longText('brisha');
            $table->longText('mithuna');
            $table->longText('karkata');
            $table->longText('simha');
            $table->longText('kanya');
            $table->longText('tula');
            $table->longText('brishika');
            $table->longText('dhanu');
            $table->longText('makara');
            $table->longText('kumbha');
            $table->longText('meena');
            $table->enum('week_number',range(1,52))->nullable();
            $table->enum('horoscope_type',['daily','weekly','monthly','yearly']);
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
        Schema::dropIfExists('horoscopes');
    }
}
