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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('booking_code')->unique();
            $table->string('service_type');
            $table->foreignUuid('route_id')->constrained()->cascadeOnDelete();

            // ARAH PILIHAN USER (penting!)
            $table->foreignUuid('from_city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignUuid('to_city_id')->constrained('cities')->cascadeOnDelete();

            $table->string('trip_type')->nullable();
            $table->date('departure_date');
            $table->date('return_date')->nullable();

            $table->string('pickup_time_request')->nullable();
            $table->string('return_time_request')->nullable();

            // Customer
            $table->string('customer_name');
            $table->string('customer_whatsapp');

            // Address
            $table->text('pickup_address');
            $table->text('destination_address');
            $table->text('baggage')->nullable();

            // Regular only
            $table->unsignedInteger('passenger_count')->nullable();

            // Charter only
            $table->foreignUuid('vehicle_id')->nullable()->constrained()->nullOnDelete();

            // Express only
            $table->string('receiver_name')->nullable();
            $table->string('receiver_whatsapp')->nullable();
            $table->string('package_type')->nullable();
            $table->decimal('package_weight_kg', 8, 2)->nullable();
            $table->decimal('package_length_cm', 8, 2)->nullable();
            $table->decimal('package_width_cm', 8, 2)->nullable();
            $table->decimal('package_height_cm', 8, 2)->nullable();
            $table->text('package_content')->nullable();

            // Pricing snapshot
            $table->unsignedBigInteger('price_base');
            $table->unsignedInteger('seat_or_qty_used');
            $table->boolean('is_round_trip')->default(false);
            $table->unsignedBigInteger('subtotal');

            // Status
            $table->string('status')->default('new'); 
            // new|departed1|departed2|cancelled
            $table->text('cancel_reason')->nullable();

            // Security tokens
            $table->string('view_token')->unique();
            $table->string('qr_token')->unique(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
