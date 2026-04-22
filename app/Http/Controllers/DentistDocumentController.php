<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use App\Models\DentistDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DentistDocumentController extends Controller
{
    private const ALLOWED_TYPES = [
        'annual_practicing_license',
        'umdpc_registration_certificate',
        'national_id',
    ];

    public function index(Dentist $dentist)
    {
        $clinic = Auth::guard('clinic')->user();

        abort_unless($dentist->clinic_id === $clinic->id, 403);

        $documents = $dentist->documents()
            ->latest()
            ->get();

        return view('clinic.dentists.documents', compact('clinic', 'dentist', 'documents'));
    }

    public function store(Request $request, Dentist $dentist)
    {
        $clinic = Auth::guard('clinic')->user();
        abort_unless($dentist->clinic_id === $clinic->id, 403);

        $validated = $request->validate([
            'type' => ['required', 'in:' . implode(',', self::ALLOWED_TYPES)],
            'document' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'issued_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date'],
        ]);

        // expiry required for annual license
        if ($validated['type'] === 'annual_practicing_license') {
            $request->validate([
                'expires_at' => ['required', 'date', 'after:today'],
            ]);
        }

        $file = $validated['document'];
        $path = $file->store("dentist-documents/{$clinic->id}/{$dentist->id}", 'local');

        DentistDocument::create([
            'dentist_id' => $dentist->id,
            'type' => $validated['type'],
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'issued_at' => $validated['issued_at'] ?? null,
            'expires_at' => $validated['expires_at'] ?? null,
            'status' => 'pending',
        ]);

        return back()->with('status', 'Dentist document uploaded (pending review).');
    }
}