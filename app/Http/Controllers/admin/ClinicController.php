<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Clinic::query()->latest();

        if (in_array($status, ['pending', 'approved', 'rejected'], true)) {
            $query->where('status', $status);
        }

        $clinics = $query->paginate(15)->withQueryString();

        return view('admin.clinics.index', compact('clinics', 'status'));
    }

    public function pending()
    {
        $clinics = Clinic::where('status', 'pending')->latest()->paginate(15);

        return view('admin.clinics.pending', compact('clinics'));
    }

    public function show(Clinic $clinic)
    {
        $clinic->load([
            'documents' => fn ($q) => $q->latest(),
            'dentists.documents' => fn ($q) => $q->latest(),
        ]);

        // Required clinic docs
        $requiredClinicDocTypes = [
            'clinic_operating_license',
            'business_registration_ursb',
        ];

        // Required dentist docs
        $requiredDentistDocTypes = [
            'annual_practicing_license',
            'umdpc_registration_certificate',
            'national_id',
        ];

        $clinicDocTypesPresent = $clinic->documents->pluck('type')->unique()->all();
        $missingClinicDocTypes = array_values(array_diff($requiredClinicDocTypes, $clinicDocTypesPresent));

        $hasAtLeastOneDentist = $clinic->dentists->count() > 0;

        $hasDentistWithAllRequiredDocs = $clinic->dentists->contains(function ($dentist) use ($requiredDentistDocTypes) {
            $types = $dentist->documents->pluck('type')->unique()->all();
            return empty(array_diff($requiredDentistDocTypes, $types));
        });

        $canApprove = empty($missingClinicDocTypes) && $hasAtLeastOneDentist && $hasDentistWithAllRequiredDocs;

        return view('admin.clinics.show', compact(
            'clinic',
            'requiredClinicDocTypes',
            'requiredDentistDocTypes',
            'missingClinicDocTypes',
            'hasAtLeastOneDentist',
            'hasDentistWithAllRequiredDocs',
            'canApprove'
        ));
    }

    public function approve(Request $request, Clinic $clinic)
    {
        // Enforce required documents before approval
        $clinic->load(['documents', 'dentists.documents']);

        $requiredClinicDocTypes = [
            'clinic_operating_license',
            'business_registration_ursb',
        ];

        $requiredDentistDocTypes = [
            'annual_practicing_license',
            'umdpc_registration_certificate',
            'national_id',
        ];

        $clinicDocTypesPresent = $clinic->documents->pluck('type')->unique()->all();
        $missingClinicDocTypes = array_diff($requiredClinicDocTypes, $clinicDocTypesPresent);

        $hasAtLeastOneDentist = $clinic->dentists->count() > 0;

        $hasDentistWithAllRequiredDocs = $clinic->dentists->contains(function ($dentist) use ($requiredDentistDocTypes) {
            $types = $dentist->documents->pluck('type')->unique()->all();
            return empty(array_diff($requiredDentistDocTypes, $types));
        });

        if (!empty($missingClinicDocTypes) || !$hasAtLeastOneDentist || !$hasDentistWithAllRequiredDocs) {
            return back()->withErrors([
                'approval' => 'Cannot approve: missing required clinic and/or dentist documents.',
            ]);
        }

        if ($clinic->status !== 'approved') {
            $clinic->status = 'approved';
            $clinic->approved_at = now();
            $clinic->rejected_at = null;
            $clinic->rejection_reason = null;
            $clinic->save();
        }

        return redirect()
            ->route('admin.clinics.show', $clinic)
            ->with('success', 'Clinic approved successfully.');
    }

    public function reject(Request $request, Clinic $clinic)
    {
        $data = $request->validate([
            'rejection_reason' => ['nullable', 'string', 'max:255'],
        ]);

        $clinic->status = 'rejected';
        $clinic->rejected_at = now();
        $clinic->approved_at = null;
        $clinic->rejection_reason = $data['rejection_reason'] ?? null;
        $clinic->save();

        return redirect()
            ->route('admin.clinics.show', $clinic)
            ->with('success', 'Clinic rejected successfully.');
    }
}