<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
    'user_id',
    'clinic_id',
    'dentist_id',

    'patient_name',
    'patient_email',
    'patient_phone',
    'booking_reference',

    'appointment_at',
    'service',
    'notes',

    'status',
    'assigned_at',

    'cancelled_at',
    'cancelled_by',
    'cancellation_reason',
    'cancellation_note',

    'confirmed_at',
    'completed_at',

    'no_show_at',
    'no_show_marked_by',
];

    protected $casts = [
        'appointment_at' => 'datetime',
        'assigned_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'completed_at' => 'datetime',
        'no_show_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

    public function dentist(): BelongsTo
    {
        return $this->belongsTo(Dentist::class);
    }

    public function scopeForClinic($query, int $clinicId)
    {
        return $query->where('clinic_id', $clinicId);
    }

    public function isCancellable(): bool
    {
        return in_array($this->status, ['pending', 'confirmed'], true);
    }
}