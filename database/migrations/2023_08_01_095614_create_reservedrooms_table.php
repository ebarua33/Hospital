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
        Schema::create('reservedrooms', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name')->nullable();
            $table->string('age')->nullable();
            $table->string('bgroup')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('room_number')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservedrooms');
    }
};
