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
            $table->string('phone')->nullable();  // 電話
            $table->string('gender')->nullable(); // 性向
            $table->json('preferences')->nullable(); // 偏好內容
            $table->string('avatar')->nullable(); // 大頭照
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'gender', 'preferences', 'avatar']);
        });
    }
};
