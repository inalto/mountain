<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReportTimesAndQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->bigInteger('nid')->nullable();
            $table->timestamp('time_a')->nullable();
            $table->timestamp('time_r')->nullable();
            $table->integer('length')->nullable();
            $table->integer('altitude_s')->nullable();
            $table->integer('altitude_e')->nullable();
            $table->integer('drop_p')->nullable();
            $table->integer('drop_n')->nullable();
            $table->text('coords')->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('approved')->nullable();
            $table->index('nid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('nid');
            $table->dropColumn('time_a');
            $table->dropColumn('time_r');
            $table->dropColumn('length');
            $table->dropColumn('altitude_s');
            $table->dropColumn('altitude_e');
            $table->dropColumn('drop_p');
            $table->dropColumn('drop_n');
            $table->dropColumn('coords');
            $table->dropColumn('published');
            $table->dropColumn('approved');
        });
    }
}
