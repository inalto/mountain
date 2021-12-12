<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SocialiteUsersTable extends Migration
{
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropUnique(['email']);
        $table->string('password')->nullable()->change();
        $table->json('social')->nullable();
        $table->dateTime('deleted_at');

        $table->unique(['email', 'deleted_at']);
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropUnique(['email', 'deleted_at']);
        $table->dropSoftDeletes();
        $table->dropColumn(['social']);
        $table->string('password')->change();
        $table->string('email')->unique()->change();
    });
}
}