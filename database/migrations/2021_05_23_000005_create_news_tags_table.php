<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTagsTable extends Migration
{
    public function up()
    {
        Schema::create('news_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updaated_at');

            $table->dateTime('deleted_at');
        });
    }
}
