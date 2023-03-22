<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->index('id_game')->change();
            $table->index('id_user')->change();
            $table->foreign('id_game')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('games')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign('matches_id_user_foreign');
        $table->dropIndex('matches_id_user_index');
        $table->dropColumn('id_user');
        $table->dropForeign('matches_id_game_foreign');
        $table->dropIndex('matches_id_game_index');
        $table->dropColumn('id_game');
    }
};
