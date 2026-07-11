<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Tanggal publish, terpisah dari created_at supaya bisa
            // dijadwalkan/diedit manual tanpa mengubah kapan data dibuat.
            $table->timestamp('published_at')->nullable()->after('published');

            // Estimasi lama baca (menit), dihitung otomatis dari jumlah kata.
            $table->unsignedInteger('reading_time')->default(1)->after('published_at');

            // Sumber berita, opsional (misal "Reuters", "Antara").
            $table->string('source')->nullable()->after('reading_time');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['published_at', 'reading_time', 'source']);
        });
    }
};