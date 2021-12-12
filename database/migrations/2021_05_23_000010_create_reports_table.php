<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('difficulty')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updaated_at');

            $table->dateTime('deleted_at');

        });
    }
}
