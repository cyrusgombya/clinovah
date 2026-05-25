<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClinicProfileController extends Controller
{
    public function edit()
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        return view('clinic.profile.edit', compact('clinic'));
    }

    public function update(Request $request)
    {
        /** @var Clinic $clinic */
        $clinic = Auth::guard('clinic')->user();

        $data = $request->validate([
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'working_hours' => ['nullable', 'string', 'max:255'],
            'services' => ['nullable', 'string', 'max:5000'],
            'price_range' => ['nullable', 'in:low,medium,high'],

            'tagline' => ['nullable', 'string', 'max:255'],
            'about' => ['nullable', 'string', 'max:5000'],

            // storefront photo
            'photo' => ['nullable', 'image', 'max:4096'],

            // one-time location
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],

            // availability
            'availability_days' => ['nullable', 'array'],
            'availability_days.*' => ['string'],

            'opening_time' => ['nullable', 'date_format:H:i'],
            'closing_time' => ['nullable', 'date_format:H:i'],

            'slot_minutes' => ['nullable', 'integer', 'min:15', 'max:480'],
        ]);

        // one-time location lock
        if (
            (empty($clinic->latitude) || empty($clinic->longitude)) &&
            !empty($data['latitude']) &&
            !empty($data['longitude'])
        ) {
            $clinic->latitude = $data['latitude'];
            $clinic->longitude = $data['longitude'];
        }

        unset($data['latitude'], $data['longitude']);

        // storefront photo
        if ($request->hasFile('photo')) {

            if (
                $clinic->photo_path &&
                Storage::disk('public')->exists($clinic->photo_path)
            ) {
                Storage::disk('public')->delete($clinic->photo_path);
            }

            $data['photo_path'] = $request
                ->file('photo')
                ->store("clinic-storefront/{$clinic->id}", 'public');
        }

        // normalize days
        $data['availability_days'] = array_values(
            $data['availability_days'] ?? []
        );

        $clinic->fill($data);
        $clinic->save();

        return back()->with('status', 'Profile updated.');
    }
}