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
        Schema::table('pakets', function (Blueprint $table) {
            // Hapus foreign key dulu baru hapus kolomnya
            if (Schema::hasColumn('pakets', 'metode_id')) {
                $table->dropForeign(['metode_id']);
                $table->dropColumn('metode_id');
            }

            if (Schema::hasColumn('pakets', 'kelas_id')) {
                $table->dropForeign(['kelas_id']);
                $table->dropColumn('kelas_id');
            }

            // Tambah kolom baru
            if (!Schema::hasColumn('pakets', 'price')) {
                $table->decimal('price', 10, 2)->after('nama_paket');
            }

            if (!Schema::hasColumn('pakets', 'is_bestseller')) {
                $table->boolean('is_bestseller')->default(false)->after('price');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pakets', function (Blueprint $table) {
            // Kembalikan kolom lama
            $table->foreignId('metode_id')->constrained('metodes')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');

            // Hapus kolom baru
            $table->dropColumn(['price', 'is_bestseller']);
        });
    }
};
