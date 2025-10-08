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
        Schema::table('metodes', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
            // bisa pakai string, karena biasanya untuk simpan path file
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metodes', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
