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
        Schema::create('pricing_models', function (Blueprint $table) {
            $table->id();
            $table->decimal('base_fare', 8, 2)->default(0.00);
            $table->decimal('per_km_rate', 6, 2);
            $table->decimal('size_multiplier', 5, 2)->default(1.00);
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')
                ->references('id')
                ->on('drivers')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_models');
    }
};
