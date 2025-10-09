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
        Schema::rename('brand_categories', 'brand_category');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('brand_category', 'brand_categories');
    }
};
