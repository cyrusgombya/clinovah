<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClinicAuthController extends Controller
{
    public function showRegister()
    {
        return view('clinic_auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:clinics,email'],
            'phone' => ['nullable','string','max:50'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $clinic = Clinic::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
            'status' => 'pending',
        ]);

        Auth::guard('clinic')->login($clinic);

        return redirect()->route('clinic.dashboard');
    }

    public function showLogin()
    {
        return view('clinic_auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('clinic')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('clinic.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid clinic credentials.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('clinic')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('clinic.login');
    }
}