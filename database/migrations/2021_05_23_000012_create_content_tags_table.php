<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTagsTable extends Migration
{
    public function up()
    {
        Schema::create('content_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->dateTime('deleted_at')->nullable();
        });
    }
}
