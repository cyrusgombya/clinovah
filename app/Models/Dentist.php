<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    protected $fillable = [
        'clinic_id',
        'full_name',
        'email',
        'phone',
    ];

    public function clinic()
    {
        return $this->belongsTo(\App\Models\Clinic::class);
    }

    public function documents()
    {
        return $this->hasMany(\App\Models\DentistDocument::class);
    }

    public function appointments()
    {
        // FIX: ensure Appointment class is correctly referenced
        return $this->hasMany(\App\Models\Appointment::class);
    }
}