<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentPagesTable extends Migration
{
    public function up()
    {
        Schema::create('content_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('page_text')->nullable();
            $table->longText('excerpt')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->dateTime('deleted_at')->nullable();
        });
    }
}
