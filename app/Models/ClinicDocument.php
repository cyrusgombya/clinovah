<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicDocument extends Model
{
    protected $fillable = [
        'clinic_id',
        'type',
        'original_name',
        'path',
        'mime_type',
        'size',
        'status',
        'rejection_reason',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}