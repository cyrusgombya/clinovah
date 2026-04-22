<?php

namespace App\Http\Controllers;

use App\Models\ClinicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClinicDocumentController extends Controller
{
    private const ALLOWED_TYPES = [
        'clinic_operating_license',
        'business_registration_ursb',
    ];

    // ✅ Added: shared validation rules for file uploads
    private const FILE_RULES = [
        'file',
        'mimes:pdf,jpg,jpeg,png',
        'max:4096', // KB (4MB)
    ];

    public function index()
    {
        /** @var \App\Models\Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        $documents = $clinic->documents()
            ->latest()
            ->get();

        return view('clinic.documents.index', compact('clinic', 'documents'));
    }

    public function store(Request $request)
    {
        /** @var \App\Models\Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        $validated = $request->validate([
            'clinic_operating_license' => array_merge(['required'], self::FILE_RULES),
            'business_registration_ursb' => array_merge(['required'], self::FILE_RULES),
        ]);

        $uploads = [
            'clinic_operating_license' => $validated['clinic_operating_license'],
            'business_registration_ursb' => $validated['business_registration_ursb'],
        ];

        foreach ($uploads as $type => $file) {
            // If this clinic already has a doc of this type, delete it (and its stored file)
            $existing = $clinic->documents()->where('type', $type)->latest()->first();

            if ($existing) {
                if ($existing->path) {
                    Storage::disk('local')->delete($existing->path);
                }
                $existing->delete();
            }

            // store the new file
            $path = $file->store("clinic-documents/{$clinic->id}", 'local');

            ClinicDocument::create([
                'clinic_id' => $clinic->id,
                'type' => $type,
                'original_name' => $file->getClientOriginalName(),
                'path' => $path,
                'mime_type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'status' => 'pending',
            ]);
        }

        return redirect()
            ->route('clinic.dashboard')
            ->with('status', 'Documents submitted. Next: add at least one dentist and upload their documents.');
    }
}