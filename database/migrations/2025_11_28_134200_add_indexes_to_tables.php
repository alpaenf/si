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
        // Add indexes to berita table
        Schema::table('berita', function (Blueprint $table) {
            $table->index('status');
            $table->index('tanggal');
            $table->index(['status', 'tanggal']);
        });

        // Add indexes to layanan table
        Schema::table('layanan', function (Blueprint $table) {
            $table->index('aktif');
            $table->index('urutan');
            $table->index(['aktif', 'urutan']);
        });

        // Add indexes to galeri table
        Schema::table('galeri', function (Blueprint $table) {
            $table->index('created_at');
        });

        // Add indexes to faq table
        Schema::table('faq', function (Blueprint $table) {
            $table->index('status');
            $table->index('aktif');
            $table->index(['status', 'aktif']);
        });

        // Add indexes to sliders table
        Schema::table('sliders', function (Blueprint $table) {
            $table->index('aktif');
            $table->index('urutan');
            $table->index(['aktif', 'urutan']);
        });

        // Add indexes to dokumen_sakip table
        Schema::table('dokumen_sakip', function (Blueprint $table) {
            $table->index('tahun');
            $table->index('jenis');
            $table->index(['tahun', 'jenis']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['tanggal']);
            $table->dropIndex(['status', 'tanggal']);
        });

        Schema::table('layanan', function (Blueprint $table) {
            $table->dropIndex(['aktif']);
            $table->dropIndex(['urutan']);
            $table->dropIndex(['aktif', 'urutan']);
        });

        Schema::table('galeri', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('faq', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['aktif']);
            $table->dropIndex(['status', 'aktif']);
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->dropIndex(['aktif']);
            $table->dropIndex(['urutan']);
            $table->dropIndex(['aktif', 'urutan']);
        });

        Schema::table('dokumen_sakip', function (Blueprint $table) {
            $table->dropIndex(['tahun']);
            $table->dropIndex(['jenis']);
            $table->dropIndex(['tahun', 'jenis']);
        });
    }
};
