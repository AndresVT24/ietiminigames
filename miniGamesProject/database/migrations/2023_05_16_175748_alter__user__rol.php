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
        Schema::table('users', function (Blueprint $table) {
            // Otras columnas...
            $table->string('rol')->default('0')->change();
            $table->string('status')->default('0')->change();
            // Otras columnas...
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Otras columnas...
            $table->string('rol')->default('0')->change();
            $table->string('status')->default('0')->change();
            // Otras columnas...
        });
    }
};
