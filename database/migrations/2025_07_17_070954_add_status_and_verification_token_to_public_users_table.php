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
        Schema::table('public_users', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('inactive')->after('password');
            $table->string('verification_token')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('public_users', function (Blueprint $table) {
            //
        });
    }
};
