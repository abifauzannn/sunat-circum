<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            // kalau sudah ada kolom image, bisa rename jadi media
            if (Schema::hasColumn('banners', 'image')) {
                $table->renameColumn('image', 'media');
            } else {
                $table->string('media')->nullable()->after('title');
            }

            // tambahin kolom type (image/video)
            $table->enum('type', ['image', 'video'])->default('image')->after('media');
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            if (Schema::hasColumn('banners', 'media')) {
                $table->renameColumn('media', 'image');
            }
            $table->dropColumn('type');
        });
    }
};
