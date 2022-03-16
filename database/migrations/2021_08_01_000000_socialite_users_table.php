<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SocialiteUsersTable extends Migration
{
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        
        $table->string('password')->nullable()->change();
        $table->json('social')->nullable();
        $table->dateTime('deleted_at');

        
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        
        $table->dropSoftDeletes();
        $table->dropColumn(['social']);
        $table->string('password')->change();
        
    });
}
}