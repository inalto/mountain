<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportReportsCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('report_reports_category', function (Blueprint $table) {
            $table->unsignedInteger('report_id');
            $table->foreign('report_id', 'report_id_fk_2308925')->references('id')->on('reports')->onDelete('cascade');
            $table->unsignedInteger('reports_category_id');
            $table->foreign('reports_category_id', 'reports_category_id_fk_2308925')->references('id')->on('reports_categories')->onDelete('cascade');
        });
    }
}
