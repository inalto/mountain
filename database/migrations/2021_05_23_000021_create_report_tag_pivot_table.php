<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('report_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id', 'report_id_fk_3981667')->references('id')->on('reports')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_3981667')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}
