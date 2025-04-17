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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('plate_number');
            $table->enum('vehicle_type', ['sedan', 'suv', 'van', 'truck']);
            $table->enum('status', ['available', 'on_trip', 'offline'])->default('offline');
            $table->string('license_number', 50);
            $table->date('license_expiry')->nullable();
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->integer('pricing_model');
            $table->boolean('verified')->default(false);
            $table->time('shift_start')->nullable();
            $table->time('shift_end')->nullable();
            $table->string('working_area', 100);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
