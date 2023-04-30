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
        //change type of time_a column
        Schema::table('havebeentheres', function (Blueprint $table) {
            $table->time('time_a')->change();
            $table->time('time_r')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //rollback type of time_a column
        Schema::table('havebeentheres', function (Blueprint $table) {
            $table->timestamp('time_a')->change();
            $table->timestamp('time_r')->change();
        });
    }
};
