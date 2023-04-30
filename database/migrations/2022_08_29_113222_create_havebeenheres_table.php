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
        Schema::create('havebeenheres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nid')->nullable();
            $table->bigInteger('report_id')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->timestamp('time_a')->nullable();
            $table->timestamp('time_r')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('deleted_at')->nullable();

            $table->string('difficulty')->nullable();
            $table->integer('rate')->nullable();

            $table->json('location')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('havebeenheres');
    }
};
