<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePoiFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pois', function (Blueprint $table) {
            $table->bigInteger('nid')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('slug')->nullable();
            $table->text('coords')->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('approved')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pois', function (Blueprint $table) {
            if (Schema::hasColumn('pois', 'nid')) {
                $table->dropColumn('nid');
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

            $table->dropColumn('coords');
            $table->dropColumn('published');
            $table->dropColumn('approved');
        });
    }
}
