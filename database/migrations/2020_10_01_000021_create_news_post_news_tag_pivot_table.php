<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsPostNewsTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('news_post_news_tag', function (Blueprint $table) {
            $table->unsignedInteger('news_post_id');
            $table->foreign('news_post_id', 'news_post_id_fk_2308946')->references('id')->on('news_posts')->onDelete('cascade');
            $table->unsignedInteger('news_tag_id');
            $table->foreign('news_tag_id', 'news_tag_id_fk_2308946')->references('id')->on('news_tags')->onDelete('cascade');
        });
    }
}
