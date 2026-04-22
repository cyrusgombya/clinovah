<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Support\Facades\Auth;

class ClinicDashboardController extends Controller
{
    public function index()
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        // Load dentists so helper methods don't cause extra queries
        $clinic->loadMissing('dentists');

        $clinicDocsComplete = $clinic->clinicDocsComplete();
        $hasDentist = $clinic->dentists()->count() >= 1;

        // NOTE: requires Dentist model to have documents() relationship
        $dentistDocsComplete = $clinic->atLeastOneDentistFullyDocumented();

        $onboardingComplete = $clinicDocsComplete && $hasDentist && $dentistDocsComplete;

        if (!$clinic->onboarding_completed) {
            if (!$onboardingComplete) {
                $dentists = $clinic->dentists()->latest()->get();

                return view('clinic.onboarding', compact(
                    'clinic',
                    'clinicDocsComplete',
                    'hasDentist',
                    'dentistDocsComplete',
                    'dentists'
                ));
            }

            $clinic->onboarding_completed = true;
            $clinic->onboarding_completed_at = now();
            $clinic->save();
        }

        return view('clinic.dashboard', compact('clinic'));
    }
}