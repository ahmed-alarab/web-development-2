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
            $table->string('vehicle_type');
            $table->boolean('status');
            $table->string('licence_details');
            $table->double('rating')->default(0);
            $table->integer('pricing_model');
            $table->boolean('verified')->default(false);
            $table->double('starting_hours')->default(0);
            $table->double('ending_hours')->default(0);
            $table->string('working_area');
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
