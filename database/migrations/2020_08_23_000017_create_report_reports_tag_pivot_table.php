<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportReportsTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('report_reports_tag', function (Blueprint $table) {
            $table->unsignedInteger('report_id');
            $table->foreign('report_id', 'report_id_fk_2051224')->references('id')->on('reports')->onDelete('cascade');
            $table->unsignedInteger('reports_tag_id');
            $table->foreign('reports_tag_id', 'reports_tag_id_fk_2051224')->references('id')->on('reports_tags')->onDelete('cascade');
        });
    }
}
