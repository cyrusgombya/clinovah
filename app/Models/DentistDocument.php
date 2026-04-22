<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentistDocument extends Model
{
    protected $fillable = [
        'dentist_id',
        'type',
        'original_name',
        'path',
        'mime_type',
        'size',
        'issued_at',
        'expires_at',
        'status',
        'rejection_reason',
    ];

    protected $casts = [
        'issued_at' => 'date',
        'expires_at' => 'date',
    ];

    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }
}