<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();
            $table->unsignedBigInteger('report_id');
            $table->unique(['report_id','locale']);
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            


            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
        });
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('slug');
            $table->dropColumn('excerpt');
            $table->dropColumn('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_translations');
        Schema::create('reports', function (Blueprint $table) {
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
        });
    }
}
