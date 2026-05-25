<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientBookingReceivedMail;
use App\Mail\ClinicNewBookingAlertMail;

class AppointmentController extends Controller
{
    public function store(Request $request, Clinic $clinic)
{
    abort_unless($clinic->status === 'approved', 404);

    $rules = [
        'appointment_at' => ['required', 'date'],
        'dentist_id' => ['nullable', 'integer', 'exists:dentists,id'],
        'service' => ['nullable', 'string', 'max:255'],
        'notes' => ['nullable', 'string'],
    ];

    if (! $request->user()) {
        $rules['patient_name'] = ['required', 'string', 'max:255'];
        $rules['patient_email'] = ['required', 'email', 'max:255'];
        $rules['patient_phone'] = ['required', 'string', 'max:30'];
    }

    $data = $request->validate($rules);

    $appointmentAt = Carbon::parse($data['appointment_at']);

    if ($appointmentAt->isPast()) {
        return back()
            ->withErrors(['appointment_at' => 'Please choose a future date/time.'])
            ->withInput();
    }

    $slotMinutes = 120;
    $endAt = $appointmentAt->copy()->addMinutes($slotMinutes);

    if (!empty($data['dentist_id'])) {
        $belongs = $clinic->dentists()->whereKey($data['dentist_id'])->exists();

        if (!$belongs) {
            return back()
                ->withErrors(['dentist_id' => 'Selected dentist does not belong to this clinic.'])
                ->withInput();
        }

        $conflict = Appointment::query()
            ->where('clinic_id', $clinic->id)
            ->where('dentist_id', $data['dentist_id'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('appointment_at', '<', $endAt)
            ->whereRaw('DATE_ADD(appointment_at, INTERVAL ? MINUTE) > ?', [$slotMinutes, $appointmentAt->toDateTimeString()])
            ->exists();

        if ($conflict) {
            return back()
                ->withErrors(['appointment_at' => 'That specialist is already booked at that time. Please choose another time or specialist.'])
                ->withInput();
        }
    }

    if (empty($data['dentist_id'])) {
        $clinicConflict = Appointment::query()
            ->where('clinic_id', $clinic->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('appointment_at', '<', $endAt)
            ->whereRaw('DATE_ADD(appointment_at, INTERVAL ? MINUTE) > ?', [$slotMinutes, $appointmentAt->toDateTimeString()])
            ->exists();

        if ($clinicConflict) {
            return back()
                ->withErrors(['appointment_at' => 'That time slot is no longer available. Please choose another slot.'])
                ->withInput();
        }
    }

    $duplicateQuery = Appointment::query()
    ->where('clinic_id', $clinic->id)
    ->where('appointment_at', $appointmentAt)
    ->whereIn('status', ['pending', 'confirmed']);

if ($request->user()) {
    $duplicateQuery->where('user_id', $request->user()->id);
} else {
    $duplicateQuery
        ->where('patient_email', $data['patient_email'])
        ->where('patient_phone', $data['patient_phone']);
}

$duplicate = $duplicateQuery->first();

if ($duplicate) {
    return redirect()
        ->route('appointments.confirmation', $duplicate)
        ->with('success', 'You already submitted this booking.');
}

    $appointment = Appointment::create([
        'user_id' => $request->user()?->id,
        'clinic_id' => $clinic->id,
        'dentist_id' => $data['dentist_id'] ?? null,

        'patient_name' => $request->user()?->name ?? ($data['patient_name'] ?? null),
        'patient_email' => $request->user()?->email ?? ($data['patient_email'] ?? null),
        'patient_phone' => $data['patient_phone'] ?? null,
        'booking_reference' => $this->generateBookingReference(),

        'appointment_at' => $appointmentAt,
        'service' => $data['service'] ?? null,
        'notes' => $data['notes'] ?? null,
        'status' => 'pending',
        'assigned_at' => !empty($data['dentist_id']) ? now() : null,
    ]);

            $appointment->loadMissing(['clinic', 'dentist']);

        try {
            if ($appointment->patient_email) {
                Mail::to($appointment->patient_email)
                    ->send(new PatientBookingReceivedMail($appointment));
            }

            if ($clinic->email) {
                Mail::to($clinic->email)
                    ->send(new ClinicNewBookingAlertMail($appointment));
            }
        } catch (\Throwable $e) {
            report($e);
        }

    return redirect()
        ->route('appointments.confirmation', $appointment)
        ->with('success', 'Appointment request submitted.');
}

    public function confirmation(Request $request, Appointment $appointment)
    {
        if ($appointment->user_id && $request->user()) {
            abort_unless($appointment->user_id === $request->user()->id, 403);
        }

        $appointment->load(['clinic', 'dentist']);

        return view('site.appointments.confirmation', compact('appointment'));
    }

    public function mine()
    {
        return redirect()->route('dashboard.appointments');
    }

    private function generateBookingReference(): string
    {
        do {
            $reference = 'CLN-' . now()->format('ymd') . '-' . strtoupper(Str::random(5));
        } while (Appointment::where('booking_reference', $reference)->exists());

        return $reference;
    }

    public function trackForm()
{
    return view('site.appointments.track');
}

public function trackSearch(Request $request)
{
    $data = $request->validate([
        'booking_reference' => ['required', 'string'],
        'contact' => ['required', 'string'],
    ]);

    $appointment = Appointment::with(['clinic', 'dentist'])
        ->where('booking_reference', $data['booking_reference'])
        ->where(function ($query) use ($data) {
            $query->where('patient_phone', $data['contact'])
                ->orWhere('patient_email', $data['contact']);
        })
        ->first();

    if (! $appointment) {
        return back()
            ->withErrors(['booking_reference' => 'No booking found with those details. Please check your reference and contact.'])
            ->withInput();
    }

    return view('site.appointments.track', compact('appointment'));
}
}