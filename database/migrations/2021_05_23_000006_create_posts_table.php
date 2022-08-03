<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updaated_at');

            $table->dateTime('deleted_at');
        });
    }
}
