<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicDiscoveryController extends Controller
{
    public function index()
    {
        return view('clinics.near-me');
    }

    public function nearby(Request $request)
    {
        $data = $request->validate([
            'lat' => ['required', 'numeric', 'between:-90,90'],
            'lng' => ['required', 'numeric', 'between:-180,180'],
            'q' => ['nullable', 'string', 'max:255'],
            'radius_km' => ['nullable', 'numeric', 'min:1', 'max:200'],
        ]);

        $lat = (float) $data['lat'];
        $lng = (float) $data['lng'];
        $q = $data['q'] ?? null;
        $radiusKm = (float) ($data['radius_km'] ?? 25);

        // ✅ Only approved clinics + must have coordinates
        $query = Clinic::query()
            ->where('status', 'approved')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude');

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('address', 'like', "%{$q}%")
                    ->orWhere('services', 'like', "%{$q}%")
                    ->orWhere('tagline', 'like', "%{$q}%");
            });
        }

        $haversine = "(6371 * acos(
            cos(radians(?)) *
            cos(radians(latitude)) *
            cos(radians(longitude) - radians(?)) +
            sin(radians(?)) *
            sin(radians(latitude))
        ))";

        $clinics = $query
            ->select([
                'id', 'name', 'address', 'phone', 'working_hours', 'price_range', 'tagline', 'photo_path',
                'latitude', 'longitude', 'availability_days',
            ])
            ->selectRaw("$haversine AS distance_km", [$lat, $lng, $lat])
            ->having('distance_km', '<=', $radiusKm)
            ->orderBy('distance_km', 'asc')
            ->limit(100)
            ->get()
            ->map(function ($clinic) {

                $todayName = strtolower(now()->format('l'));

                $availableDays = collect(
                    $clinic->availability_days ?? [
                        'monday',
                        'tuesday',
                        'wednesday',
                        'thursday',
                        'friday',
                    ]
                )->map(fn ($d) => strtolower($d));

                $clinic->is_open_today = $availableDays->contains($todayName);

                return $clinic;
            });

        return response()->json(['data' => $clinics]);
    }
}