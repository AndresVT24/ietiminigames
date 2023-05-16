<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPointsToMatchesTable extends Migration
{
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->unsignedInteger('points')->default(0);
        });
    }

    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn('points');
        });
    }
}