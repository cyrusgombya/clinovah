<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    public function store(Request $request, Clinic $clinic)
    {
        abort_unless($clinic->status === 'approved', 404);

        $data = $request->validate([
            'appointment_at' => ['required', 'date'],
            'dentist_id' => ['nullable', 'integer', 'exists:dentists,id'],
            'service' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ]);

        $appointmentAt = Carbon::parse($data['appointment_at']);
        if ($appointmentAt->isPast()) {
            return back()
                ->withErrors(['appointment_at' => 'Please choose a future date/time.'])
                ->withInput();
        }

        $slotMinutes = 20;
        $endAt = $appointmentAt->copy()->addMinutes($slotMinutes);

        if (!empty($data['dentist_id'])) {
            $belongs = $clinic->dentists()->whereKey($data['dentist_id'])->exists();
            if (!$belongs) {
                return back()
                    ->withErrors(['dentist_id' => 'Selected dentist does not belong to this clinic.'])
                    ->withInput();
            }

            // Overlap rule (20 min slots):
            // existing_start < requested_end AND existing_end > requested_start
            $conflict = Appointment::query()
                ->where('clinic_id', $clinic->id)
                ->where('dentist_id', $data['dentist_id'])
                ->where('status', 'confirmed')
                ->where('appointment_at', '<', $endAt)
                ->whereRaw('DATE_ADD(appointment_at, INTERVAL ? MINUTE) > ?', [$slotMinutes, $appointmentAt->toDateTimeString()])
                ->exists();

            if ($conflict) {
                return back()
                    ->withErrors(['appointment_at' => 'That dentist is already booked at that time. Please choose another time or dentist.'])
                    ->withInput();
            }
        }

        Appointment::create([
            'user_id' => $request->user()->id,
            'clinic_id' => $clinic->id,
            'dentist_id' => $data['dentist_id'] ?? null,
            'appointment_at' => $appointmentAt,
            'service' => $data['service'] ?? null,
            'notes' => $data['notes'] ?? null,
            'status' => 'pending',
            'assigned_at' => !empty($data['dentist_id']) ? now() : null,
        ]);

        return redirect()
            ->route('dashboard.appointments')
            ->with('success', 'Appointment request submitted.');
    }

    public function mine()
    {
        return redirect()->route('dashboard.appointments');
    }

    
}