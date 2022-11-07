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
        Schema::table('havebeentheres', function (Blueprint $table) {
            //
            $table->boolean('approved')->default(true);
            $table->boolean('published')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('havebeentheres', function (Blueprint $table) {
            //
            $table->dropColumn('approved');
            $table->dropColumn('published');


        });
    }
};
