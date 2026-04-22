<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dentist_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_id')->constrained('dentists')->cascadeOnDelete();

            // annual_practicing_license (expires yearly), umdpc_registration_certificate, national_id
            $table->string('type');

            $table->string('original_name');
            $table->string('path'); // private
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable();

            $table->date('issued_at')->nullable();
            $table->date('expires_at')->nullable(); // REQUIRED for annual_practicing_license

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('rejection_reason')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dentist_documents');
    }
};