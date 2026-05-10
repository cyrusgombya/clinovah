<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->change();

            $table->string('patient_name')->nullable()->after('dentist_id');
            $table->string('patient_email')->nullable()->after('patient_name');
            $table->string('patient_phone')->nullable()->after('patient_email');
            $table->string('booking_reference')->nullable()->unique()->after('patient_phone');
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn([
                'patient_name',
                'patient_email',
                'patient_phone',
                'booking_reference',
            ]);

            $table->foreignId('user_id')->nullable(false)->change();
        });
    }
};