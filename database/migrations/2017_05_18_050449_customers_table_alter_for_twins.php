<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomersTableAlterForTwins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
            $table->string('fb_id');
            $table->string('fb_username');
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('date_month')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
            $table->dropColumn(['fb_id','fb_username','date_month_twins', 'month_twins','year_twins']);
        });
    }
}
