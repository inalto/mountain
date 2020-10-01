<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReportsTable extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2308918')->references('id')->on('users');
        });
    }
}
