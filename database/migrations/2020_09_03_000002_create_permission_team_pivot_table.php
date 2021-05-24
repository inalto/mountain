<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTeamPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_team', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id', 'team_id_fk_1720879')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_1720879')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
