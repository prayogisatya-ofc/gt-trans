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
        Schema::create('routes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('route_category_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('city_a_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignUuid('city_b_id')->constrained('cities')->cascadeOnDelete();
            $table->unsignedBigInteger('price_regular');

            // SEO
            $table->string('slug')->unique();
            $table->longText('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['city_a_id', 'city_b_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
