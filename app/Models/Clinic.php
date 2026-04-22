<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Clinic extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',

        // editable profile (clinic)
        'phone',
        'address',
        'working_hours',
        'services',
        'price_range',
        'tagline',
        'about',
        'photo_path',

        // location (admin-only later)
        // 'latitude',
        // 'longitude',

        // auth/workflow
        'password',
        'status',
        'approved_at',
        'rejected_at',
        'rejection_reason',
        'onboarding_completed',
        'onboarding_completed_at',
        // next: docs fields like license files etc.
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function documents()
    {
        return $this->hasMany(\App\Models\ClinicDocument::class);
    }

    public function dentists()
    {
        return $this->hasMany(\App\Models\Dentist::class);
    }

    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }

    public function clinicDocsComplete(): bool
    {
        $required = [
            'clinic_operating_license',
            'business_registration_ursb',
        ];

        $uploaded = $this->documents()
            ->whereIn('type', $required)
            ->pluck('type')
            ->unique()
            ->all();

        return count(array_diff($required, $uploaded)) === 0;
    }

    public function atLeastOneDentistFullyDocumented(): bool
    {
        $required = [
            'annual_practicing_license',
            'umdpc_registration_certificate',
            'national_id',
        ];

        foreach ($this->dentists as $dentist) {
            $uploaded = $dentist->documents()
                ->whereIn('type', $required)
                ->pluck('type')
                ->unique()
                ->all();

            if (count(array_diff($required, $uploaded)) === 0) {
                return true;
            }
        }

        return false;
    }
}