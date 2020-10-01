<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoisTable extends Migration
{
    public function up()
    {
        Schema::create('pois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('height')->nullable();
            $table->longText('access')->nullable();
            $table->longText('description')->nullable();
            $table->longText('bibliography')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
