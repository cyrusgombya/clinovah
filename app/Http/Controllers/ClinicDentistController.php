<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Dentist;
use App\Models\DentistDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClinicDentistController extends Controller
{
    private const FILE_RULES = ['file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'];

    public function index()
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        $dentists = $clinic->dentists()
            ->latest()
            ->get();

        return view('clinic.dentists.index', compact('clinic', 'dentists'));
    }

    public function store(Request $request)
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],

            // required docs
            'annual_practicing_license' => array_merge(['required'], self::FILE_RULES),
            'annual_practicing_license_expires_at' => ['required', 'date', 'after:today'],

            'umdpc_registration_certificate' => array_merge(['required'], self::FILE_RULES),
            'national_id' => array_merge(['required'], self::FILE_RULES),
        ]);

        DB::transaction(function () use ($clinic, $validated) {
            $dentist = Dentist::create([
                'clinic_id' => $clinic->id,
                'full_name' => $validated['full_name'],
                'email' => $validated['email'] ?? null,
                'phone' => $validated['phone'] ?? null,
            ]);

            $uploads = [
                'annual_practicing_license' => [
                    'file' => $validated['annual_practicing_license'],
                    'issued_at' => null,
                    'expires_at' => $validated['annual_practicing_license_expires_at'],
                ],
                'umdpc_registration_certificate' => [
                    'file' => $validated['umdpc_registration_certificate'],
                    'issued_at' => null,
                    'expires_at' => null,
                ],
                'national_id' => [
                    'file' => $validated['national_id'],
                    'issued_at' => null,
                    'expires_at' => null,
                ],
            ];

            foreach ($uploads as $type => $meta) {
                $file = $meta['file'];

                $path = $file->store("dentist-documents/{$clinic->id}/{$dentist->id}", 'local');

                DentistDocument::create([
                    'dentist_id' => $dentist->id,
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                    'issued_at' => $meta['issued_at'],
                    'expires_at' => $meta['expires_at'],
                    'status' => 'pending',
                ]);
            }
        });

        return redirect()
            ->route('clinic.dashboard')
            ->with('status', 'Dentist added with documents. Return to onboarding to confirm completion.');
    }
}