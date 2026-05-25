<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Support\Facades\Auth;

class ClinicDashboardController extends Controller
{
    public function index()
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        $clinic->loadMissing('dentists');

        $clinicDocsComplete = $clinic->clinicDocsComplete();
        $hasDentist = $clinic->dentists()->count() >= 1;
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

        $todayAppointments = Appointment::where('clinic_id', $clinic->id)
            ->whereDate('appointment_at', today())
            ->count();

        $pendingAppointments = Appointment::where('clinic_id', $clinic->id)
            ->where('status', 'pending')
            ->count();

        $confirmedAppointments = Appointment::where('clinic_id', $clinic->id)
            ->where('status', 'confirmed')
            ->where('appointment_at', '>=', now())
            ->count();

        $totalAppointments = Appointment::where('clinic_id', $clinic->id)
            ->count();

        $dentistsCount = $clinic->dentists()->count();

        $documentsCount = $clinic->documents()->count();

        return view('clinic.dashboard', compact(
            'clinic',
            'todayAppointments',
            'pendingAppointments',
            'confirmedAppointments',
            'totalAppointments',
            'dentistsCount',
            'documentsCount'
        ));
    }
}