<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AppointmentCancelledNotification;
use App\Notifications\AppointmentCancelledByUserNotification;
use App\Notifications\AppointmentConfirmedNotification;

class ClinicAppointmentController extends Controller
{
    public function index(Request $request)
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        $tab = $request->query('tab', 'upcoming');

        $query = Appointment::with(['user', 'dentist'])
            ->forClinic($clinic->id);

        if ($tab === 'upcoming') {
            $query->whereIn('status', ['pending', 'confirmed'])
                  ->where('appointment_at', '>=', now())
                  ->orderBy('appointment_at');
        } elseif ($tab === 'past') {
            $query->where('appointment_at', '<', now())
                  ->whereNotIn('status', ['cancelled', 'no_show'])
                  ->latest('appointment_at');
        } elseif ($tab === 'cancelled') {
            $query->where('status', 'cancelled')->latest('appointment_at');
        } elseif ($tab === 'no_show') {
            $query->where('status', 'no_show')->latest('appointment_at');
        } else {
            $tab = 'upcoming';
            $query->whereIn('status', ['pending', 'confirmed'])
                  ->where('appointment_at', '>=', now())
                  ->orderBy('appointment_at');
        }

        // optional search (patient name/email)
        if ($search = $request->query('q')) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $appointments = $query->paginate(10)->withQueryString();

        return view('clinic.appointments.index', compact('clinic', 'appointments', 'tab'));
    }

   public function confirm(Request $request, Appointment $appointment)
{
    /** @var Clinic $clinic */
    $clinic = Auth::guard('clinic')->user();

    abort_unless($appointment->clinic_id === $clinic->id, 403);

    if (!in_array($appointment->status, ['pending'], true)) {
        return back()->withErrors(['status' => 'Only pending appointments can be confirmed.']);
    }

    if ($appointment->appointment_at?->isPast()) {
        return back()->withErrors(['appointment_at' => 'Cannot confirm an appointment in the past.']);
    }

    // ✅ clinic can choose a dentist at confirm time (or keep existing)
    $data = $request->validate([
        'dentist_id' => ['required', 'integer', 'exists:dentists,id'],
    ]);

    // must belong to this clinic
    $belongs = $clinic->dentists()->whereKey($data['dentist_id'])->exists();
    if (!$belongs) {
        return back()->withErrors(['dentist_id' => 'Selected dentist does not belong to this clinic.']);
    }

    $slotMinutes = 20;
    $startAt = $appointment->appointment_at;
    $endAt = $startAt->copy()->addMinutes($slotMinutes);

    // check conflicts for the dentist chosen at confirm time
    $conflict = Appointment::query()
        ->where('clinic_id', $clinic->id)
        ->where('dentist_id', $data['dentist_id'])
        ->where('status', 'confirmed')
        ->where('id', '!=', $appointment->id)
        ->where('appointment_at', '<', $endAt)
        ->whereRaw('DATE_ADD(appointment_at, INTERVAL ? MINUTE) > ?', [$slotMinutes, $startAt->toDateTimeString()])
        ->exists();

    if ($conflict) {
        return back()->withErrors(['dentist_id' => 'That dentist is already booked at that time. Choose another dentist.']);
    }

    // assign dentist + confirm
    $appointment->dentist_id = $data['dentist_id'];
    $appointment->assigned_at = $appointment->assigned_at ?? now();
    $appointment->status = 'confirmed';
    $appointment->confirmed_at = now();
    $appointment->save();

    // (2) email notification (already in your code)
    $appointment->loadMissing(['user', 'clinic', 'dentist']);
    $appointment->user->notify(new AppointmentConfirmedNotification($appointment));

    return back()->with('status', 'Appointment confirmed.');
}
    public function cancel(Request $request, Appointment $appointment)
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        abort_unless($appointment->clinic_id === $clinic->id, 403);

        $data = $request->validate([
            'cancellation_reason' => ['required', 'string', 'max:255'],
            'cancellation_note' => ['nullable', 'string', 'max:2000'],
        ]);

        if (!$appointment->isCancellable()) {
            return back()->withErrors(['status' => 'This appointment cannot be cancelled.']);
        }

        $appointment->status = 'cancelled';
        $appointment->cancelled_at = now();
        $appointment->cancelled_by = 'clinic';
        $appointment->cancellation_reason = $data['cancellation_reason'];
        $appointment->cancellation_note = $data['cancellation_note'] ?? null;
        $appointment->save();
        $appointment->loadMissing(['user', 'clinic']);
        $appointment->user->notify(new AppointmentCancelledNotification($appointment));

        // TODO: send notification to user (email + WhatsApp later)

        return back()->with('status', 'Appointment cancelled and patient will be notified.');
    }

    public function markNoShow(Request $request, Appointment $appointment)
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        abort_unless($appointment->clinic_id === $clinic->id, 403);

        if (!in_array($appointment->status, ['confirmed', 'pending'], true)) {
            return back()->withErrors(['status' => 'Only pending/confirmed appointments can be marked as no-show.']);
        }

        // optional: only allow after appointment time
        if ($appointment->appointment_at->isFuture()) {
            return back()->withErrors(['status' => 'You can only mark no-show after the appointment time has passed.']);
        }

        $appointment->status = 'no_show';
        $appointment->no_show_at = now();
        $appointment->no_show_marked_by = 'clinic';
        $appointment->save();
        $appointment->loadMissing(['user', 'clinic']);
        $appointment->user->notify(new \App\Notifications\AppointmentCancelledNotification($appointment));

        // increment user no-show count
        $appointment->user()->increment('no_show_count');

        // TODO: notify user (optional)

        return back()->with('status', 'Marked as no-show.');
    }
}