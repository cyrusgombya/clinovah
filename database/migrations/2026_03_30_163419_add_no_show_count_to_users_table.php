<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // add new statuses: no_show, completed (keep pending/confirmed/cancelled)
            // NOTE: MySQL enum alteration varies; safest is raw statement (below).
            // We'll still add columns in schema builder.

            $table->timestamp('cancelled_at')->nullable()->after('status');
            $table->string('cancelled_by')->nullable()->after('cancelled_at'); // 'clinic' or 'user'
            $table->string('cancellation_reason')->nullable()->after('cancelled_by');
            $table->text('cancellation_note')->nullable()->after('cancellation_reason');

            $table->timestamp('confirmed_at')->nullable()->after('assigned_at');
            $table->timestamp('completed_at')->nullable()->after('confirmed_at');

            $table->timestamp('no_show_at')->nullable()->after('completed_at');
            $table->string('no_show_marked_by')->nullable()->after('no_show_at'); // 'clinic'
        });

        // Expand enum to include no_show and completed
        // MySQL-specific:
        DB::statement("ALTER TABLE `appointments` MODIFY `status` ENUM('pending','confirmed','cancelled','no_show','completed') NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        // revert enum back (data must be cleaned first if any rows have these statuses)
        DB::statement("ALTER TABLE `appointments` MODIFY `status` ENUM('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending'");

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn([
                'cancelled_at',
                'cancelled_by',
                'cancellation_reason',
                'cancellation_note',
                'confirmed_at',
                'completed_at',
                'no_show_at',
                'no_show_marked_by',
            ]);
        });
    }
};