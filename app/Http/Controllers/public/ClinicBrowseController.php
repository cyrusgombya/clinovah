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

    $alternativeClinics = Clinic::where('status', 'approved')
        ->where('id', '!=', $clinic->id)
        ->latest()
        ->limit(3)
        ->get();

    return view('site.clinics.show', compact('clinic', 'alternativeClinics'));
}

    public function availableSlots(Clinic $clinic)
{
    abort_unless($clinic->status === 'approved', 404);

    $slotMinutes = 120;
    $days = 14;

    $timeSlots = ['08:00', '10:00', '12:00', '14:00', '16:00'];

    $startDate = now()->startOfDay();
    $endDate = now()->copy()->addDays($days)->endOfDay();

    $bookedAppointments = \App\Models\Appointment::query()
        ->where('clinic_id', $clinic->id)
        ->whereIn('status', ['pending', 'confirmed'])
        ->whereBetween('appointment_at', [$startDate, $endDate])
        ->get();

    $slots = [];

    for ($i = 0; $i < $days; $i++) {
        $date = now()->copy()->addDays($i);

        foreach ($timeSlots as $time) {
            $slotStart = \Illuminate\Support\Carbon::parse($date->format('Y-m-d') . ' ' . $time);
            $slotEnd = $slotStart->copy()->addMinutes($slotMinutes);

            $isPast = $slotStart->isPast();

            $isBooked = $bookedAppointments->contains(function ($appointment) use ($slotStart, $slotEnd) {
                $appointmentStart = $appointment->appointment_at;
                $appointmentEnd = $appointmentStart->copy()->addMinutes(120);

                return $appointmentStart->lt($slotEnd) && $appointmentEnd->gt($slotStart);
            });

            $slots[] = [
                'date' => $date->format('Y-m-d'),
                'time' => $time,
                'datetime' => $slotStart->format('Y-m-d\\TH:i'),
                'label' => $slotStart->format('g:i A'),
                'status' => $isPast ? 'past' : ($isBooked ? 'booked' : 'available'),
            ];
        }
    }

    return response()->json([
        'data' => $slots,
    ]);
}
}