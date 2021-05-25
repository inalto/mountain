<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_translations', function (Blueprint $table) {
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();
            // Foreign key to the main model
            $table->unsignedInteger('report_id');
            $table->unique(['report_id', 'locale']);
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            
            $table->string('title');
            $table->string('difficulty')->nullable();
            $table->string('slug')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_translations');
    }
}
