<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('clinic_id')->constrained('clinics')->cascadeOnDelete();

            // optional: user can pick dentist OR clinic assigns later
            $table->foreignId('dentist_id')->nullable()->constrained('dentists')->nullOnDelete();

            $table->dateTime('appointment_at');

            $table->string('service')->nullable();
            $table->text('notes')->nullable();

            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');

            $table->timestamp('assigned_at')->nullable(); // when dentist_id set/changed
            $table->timestamps();

            $table->index(['clinic_id', 'appointment_at']);
            $table->index(['dentist_id', 'appointment_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};