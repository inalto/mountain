<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoisTable extends Migration
{
    public function up()
    {
        Schema::create('pois', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('lon')->nullable();
            $table->string('height')->nullable();
            $table->longText('access')->nullable();
            $table->string('description')->nullable();
            $table->string('biography')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
