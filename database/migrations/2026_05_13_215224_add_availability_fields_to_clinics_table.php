<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->json('availability_days')->nullable()->after('working_hours');
            $table->time('opening_time')->nullable()->after('availability_days');
            $table->time('closing_time')->nullable()->after('opening_time');
            $table->unsignedInteger('slot_minutes')->default(120)->after('closing_time');
        });
    }

    public function down(): void
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn([
                'availability_days',
                'opening_time',
                'closing_time',
                'slot_minutes',
            ]);
        });
    }
};