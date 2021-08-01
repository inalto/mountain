<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryReportPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_report', function (Blueprint $table) {
            $table->unsignedBigInteger('report_id');
            $table->foreign('report_id', 'report_id_fk_3981668')->references('id')->on('reports')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_3981668')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
