<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicBrowseController extends Controller
{
   public function index(Request $request)
{
    $query = Clinic::query()
        ->where('status', 'approved');

    if ($request->filled('q')) {
        $search = $request->q;

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('services', 'like', "%{$search}%")
              ->orWhere('address', 'like', "%{$search}%")
              ->orWhere('tagline', 'like', "%{$search}%");
        });
    }

    $clinics = $query
        ->latest()
        ->paginate(12)
        ->withQueryString();

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

    $slotMinutes = $clinic->slot_minutes ?? 120;
    $days = 14;

    $openingTime = $clinic->opening_time ?? '08:00';
    $closingTime = $clinic->closing_time ?? '17:00';

    $availableDays = collect(
        $clinic->availability_days ?? [
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
        ]
    )->map(fn ($d) => strtolower($d));

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

        $dayName = strtolower($date->format('l'));

        // skip unavailable days
        if (! $availableDays->contains($dayName)) {
            continue;
        }

        $currentSlot = \Illuminate\Support\Carbon::parse(
            $date->format('Y-m-d') . ' ' . $openingTime
        );

        $closingSlot = \Illuminate\Support\Carbon::parse(
            $date->format('Y-m-d') . ' ' . $closingTime
        );

        while ($currentSlot->copy()->addMinutes($slotMinutes) <= $closingSlot) {

            $slotStart = $currentSlot->copy();
            $slotEnd = $slotStart->copy()->addMinutes($slotMinutes);

            $isPast = $slotStart->isPast();

            $isBooked = $bookedAppointments->contains(
                function ($appointment) use ($slotStart, $slotEnd, $slotMinutes) {

                    $appointmentStart = $appointment->appointment_at;

                    $appointmentEnd = $appointmentStart
                        ->copy()
                        ->addMinutes($slotMinutes);

                    return $appointmentStart->lt($slotEnd)
                        && $appointmentEnd->gt($slotStart);
                }
            );

            $slots[] = [
                'date' => $date->format('Y-m-d'),
                'time' => $slotStart->format('H:i'),
                'datetime' => $slotStart->format('Y-m-d\\TH:i'),
                'label' => $slotStart->format('g:i A'),
                'status' => $isPast
                    ? 'past'
                    : ($isBooked ? 'booked' : 'available'),
            ];

            $currentSlot->addMinutes($slotMinutes);
        }
    }

    return response()->json([
        'data' => $slots,
    ]);
}
}