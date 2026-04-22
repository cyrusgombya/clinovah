<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\AppointmentCancelledByUserNotification;
use App\Notifications\AppointmentCancelledNotification;


class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $upcoming = Appointment::with(['clinic', 'dentist'])
            ->where('user_id', $request->user()->id)
            ->where('appointment_at', '>=', now())
            ->orderBy('appointment_at')
            ->limit(5)
            ->get();

        return view('site.user.dashboard', compact('upcoming'));
    }

    public function appointments(Request $request)
    {
        $appointments = Appointment::with(['clinic', 'dentist'])
            ->where('user_id', $request->user()->id)
            ->latest('appointment_at')
            ->paginate(10);

        return view('site.user.appointments', compact('appointments'));
    }

    public function cancelAppointment(Request $request, Appointment $appointment)
    {
        abort_unless($appointment->user_id === $request->user()->id, 403);

        $data = $request->validate([
            'cancellation_reason' => ['required', 'string', 'max:255'],
            'cancellation_note' => ['nullable', 'string', 'max:2000'],
        ]);

        if (!in_array($appointment->status, ['pending', 'confirmed'], true)) {
            return back()->withErrors(['status' => 'This appointment cannot be cancelled.']);
        }

        $appointment->loadMissing(['clinic', 'user']);

        $appointment->status = 'cancelled';
        $appointment->cancelled_at = now();
        $appointment->cancelled_by = 'user';
        $appointment->cancellation_reason = $data['cancellation_reason'];
        $appointment->cancellation_note = $data['cancellation_note'] ?? null;
        $appointment->save();
        $appointment->loadMissing(['user', 'clinic']);
        $appointment->user->notify(new AppointmentCancelledNotification($appointment));

        // Notify clinic by email (queued)
        $appointment->clinic->notify(new AppointmentCancelledByUserNotification($appointment));

        return back()->with('success', 'Appointment cancelled. The clinic has been notified.');
    }
}