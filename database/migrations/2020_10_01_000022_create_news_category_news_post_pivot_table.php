<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoryNewsPostPivotTable extends Migration
{
    public function up()
    {
        Schema::create('news_category_news_post', function (Blueprint $table) {
            $table->unsignedInteger('news_post_id');
            $table->foreign('news_post_id', 'news_post_id_fk_2308947')->references('id')->on('news_posts')->onDelete('cascade');
            $table->unsignedInteger('news_category_id');
            $table->foreign('news_category_id', 'news_category_id_fk_2308947')->references('id')->on('news_categories')->onDelete('cascade');
        });
    }
}
