<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Clinic;

class ClinicBrowseController extends Controller
{
    public function index()
    {
        $clinics = Clinic::where('status', 'approved')
            ->latest()
            ->paginate(12);

        return view('site.clinics.index', compact('clinics'));
    }

    public function show(Clinic $clinic)
    {
        abort_unless($clinic->status === 'approved', 404);

        $clinic->load(['dentists']);

        return view('site.clinics.show', compact('clinic'));
    }
}