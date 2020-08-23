<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description_short')->nullable();
            $table->longText('description')->nullable();
            $table->string('difficulty')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
