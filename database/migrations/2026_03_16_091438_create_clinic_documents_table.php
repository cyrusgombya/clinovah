<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clinic_documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('clinic_id')->constrained('clinics')->cascadeOnDelete();

            // Required:
            // - clinic_operating_license (Health Unit license)
            // - business_registration_ursb (URSB certificate)
            $table->string('type');

            $table->string('original_name');
            $table->string('path'); // stored under storage/app (private)
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable();

            // review workflow (optional; admin later)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('rejection_reason')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_documents');
    }
};