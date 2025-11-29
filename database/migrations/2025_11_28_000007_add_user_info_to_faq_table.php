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
        Schema::table('faq', function (Blueprint $table) {
            $table->string('nama')->nullable()->after('id');
            $table->string('email')->nullable()->after('nama');
            $table->enum('status', ['pending', 'dijawab'])->default('pending')->after('jawaban');
            $table->timestamp('dijawab_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faq', function (Blueprint $table) {
            $table->dropColumn(['nama', 'email', 'status', 'dijawab_at']);
        });
    }
};
