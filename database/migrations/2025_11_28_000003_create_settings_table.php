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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, textarea, image, email, url, phone
            $table->string('group')->default('general'); // general, contact, social, etc
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            ['key' => 'site_name', 'value' => 'Diskominfo Kab. Pemalang', 'type' => 'text', 'group' => 'general', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_description', 'value' => 'Dinas Komunikasi dan Informatika Kabupaten Pemalang', 'type' => 'textarea', 'group' => 'general', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_logo', 'value' => '', 'type' => 'image', 'group' => 'general', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_address', 'value' => 'Jl. Contoh No. 123, Pemalang', 'type' => 'textarea', 'group' => 'contact', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_phone', 'value' => '0284-123456', 'type' => 'phone', 'group' => 'contact', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_email', 'value' => 'diskominfo@pemalangkab.go.id', 'type' => 'email', 'group' => 'contact', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'social_facebook', 'value' => '', 'type' => 'url', 'group' => 'social', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'social_instagram', 'value' => '', 'type' => 'url', 'group' => 'social', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'social_twitter', 'value' => '', 'type' => 'url', 'group' => 'social', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'social_youtube', 'value' => '', 'type' => 'url', 'group' => 'social', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
