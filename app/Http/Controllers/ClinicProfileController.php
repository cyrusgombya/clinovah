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

        // ✅ one-time location submit
        'latitude' => ['nullable', 'numeric', 'between:-90,90'],
        'longitude' => ['nullable', 'numeric', 'between:-180,180'],
    ]);

    // ✅ One-time location submit: only set if not already set
    if (
        (empty($clinic->latitude) || empty($clinic->longitude)) &&
        !empty($data['latitude']) &&
        !empty($data['longitude'])
    ) {
        $clinic->latitude = $data['latitude'];
        $clinic->longitude = $data['longitude'];
    }

    // don't allow mass-assigning these
    unset($data['latitude'], $data['longitude']);

    if ($request->hasFile('photo')) {
        // delete old photo if present
        if ($clinic->photo_path && Storage::disk('public')->exists($clinic->photo_path)) {
            Storage::disk('public')->delete($clinic->photo_path);
        }

        $data['photo_path'] = $request->file('photo')->store("clinic-storefront/{$clinic->id}", 'public');
    }

    $clinic->fill($data);
    $clinic->save();

    return back()->with('status', 'Profile updated.');
}
}