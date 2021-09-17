<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoisTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pois_translations');
        Schema::create('pois_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();
            $table->unsignedBigInteger('poi_id');
            $table->unique(['poi_id','locale']);
            $table->foreign('poi_id')->references('id')->on('pois')->onDelete('cascade');


            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
 
        Schema::table('pois', function (Blueprint $table) {
            
            if (Schema::hasColumn('pois', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('pois', 'excerpt')) {
                $table->dropColumn('excerpt');
            }
            if (Schema::hasColumn('pois', 'content')) {
                $table->dropColumn('content');
            }
            if (Schema::hasColumn('pois', 'slug')) {
                $table->dropColumn('slug');
            }
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pois_translations');

        Schema::table('pois', function (Blueprint $table) {
            
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
        });
    }
}
