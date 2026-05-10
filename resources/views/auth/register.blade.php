


{{-- =========================================================
FILE 2: resources/views/auth/register.blade.php
Clinovah themed user registration page
========================================================= --}}

@extends('layouts.site')

@section('title', 'Create Account | Clinovah')

@section('content')

@push('styles')
<style>
  .cv-auth-page {
    min-height: calc(100vh - 90px);
    background:
      radial-gradient(circle at 10% 12%, rgba(255, 142, 7, 0.12), transparent 28%),
      radial-gradient(circle at 88% 16%, rgba(14, 82, 63, 0.12), transparent 32%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
    padding: 70px 0;
  }

  .cv-auth-card {
    background: rgba(255, 255, 255, 0.96);
    border: 1px solid var(--cv-border);
    border-radius: 34px;
    padding: 34px;
    box-shadow: 0 30px 90px rgba(14, 82, 63, 0.13);
  }

  .cv-auth-side {
    height: 100%;
    background: linear-gradient(135deg, var(--cv-green), #07352a);
    border-radius: 34px;
    padding: 34px;
    color: #fff;
    position: relative;
    overflow: hidden;
  }

  .cv-auth-side::after {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    right: -90px;
    bottom: -90px;
    background: rgba(255, 255, 255, 0.08);
  }

  .cv-auth-title {
    color: var(--cv-dark);
    font-weight: 950;
    letter-spacing: -1.4px;
    font-size: clamp(34px, 4vw, 48px);
    line-height: 1.05;
  }

  .cv-auth-text {
    color: var(--cv-muted);
    line-height: 1.75;
  }

  .cv-auth-label {
    color: var(--cv-dark);
    font-weight: 900;
    margin-bottom: 8px;
  }

  .cv-auth-input {
    width: 100%;
    min-height: 56px;
    border: 1px solid #dce9e2;
    border-radius: 18px;
    padding: 0 18px;
    color: var(--cv-dark);
    font-weight: 700;
    outline: none;
    background: #fff;
  }

  .cv-auth-input:focus {
    border-color: var(--cv-green);
    box-shadow: 0 0 0 4px rgba(14, 82, 63, 0.08);
  }

  .cv-auth-link {
    color: var(--cv-green);
    font-weight: 900;
  }

  .cv-auth-link:hover {
    color: var(--cv-orange);
  }

  .cv-auth-feature {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    margin-top: 20px;
    position: relative;
    z-index: 2;
  }

  .cv-auth-feature-icon {
    width: 44px;
    height: 44px;
    border-radius: 16px;
    background: rgba(255,255,255,0.14);
    display: grid;
    place-items: center;
    flex: 0 0 44px;
    font-size: 22px;
  }

  .cv-error-text {
    color: #dc2626;
    font-size: 13px;
    font-weight: 700;
    margin-top: 6px;
  }
</style>
@endpush

<main class="cv-auth-page">
  <div class="container">
    <div class="row justify-content-center align-items-stretch g-4">
      <div class="col-lg-5">
        <div class="cv-auth-side">
          <div class="cv-logo-text text-white mb-4">Clin<span style="color:var(--cv-orange);">o</span>vah</div>
          <h2 class="fw-bold mb-3 position-relative" style="z-index:2;">Create your care account.</h2>
          <p class="text-white-50 mb-4 position-relative" style="z-index:2;">Sign up once, then book appointments and track clinic responses from your dashboard.</p>

          <div class="cv-auth-feature">
            <div class="cv-auth-feature-icon">🏥</div>
            <div><strong>Find clinics faster</strong><p class="text-white-50 mb-0 small">Search clinics and services from one place.</p></div>
          </div>

          <div class="cv-auth-feature">
            <div class="cv-auth-feature-icon">📅</div>
            <div><strong>Manage bookings</strong><p class="text-white-50 mb-0 small">View upcoming, past, and pending appointments.</p></div>
          </div>

          <div class="cv-auth-feature">
            <div class="cv-auth-feature-icon">🛡️</div>
            <div><strong>Simple and private</strong><p class="text-white-50 mb-0 small">Only the details needed for your appointment journey.</p></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="cv-auth-card">
          <h1 class="cv-auth-title">Create Account</h1>
          <p class="cv-auth-text mb-4">Register to request appointments and view your booking updates.</p>

          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
              <label for="name" class="cv-auth-label">Full Name</label>
              <input id="name" class="cv-auth-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your full name">
              @error('name')<div class="cv-error-text">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="email" class="cv-auth-label">Email Address</label>
              <input id="email" class="cv-auth-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com">
              @error('email')<div class="cv-error-text">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
              <label for="password" class="cv-auth-label">Password</label>
              <input id="password" class="cv-auth-input" type="password" name="password" required autocomplete="new-password" placeholder="Create a password">
              @error('password')<div class="cv-error-text">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
              <label for="password_confirmation" class="cv-auth-label">Confirm Password</label>
              <input id="password_confirmation" class="cv-auth-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
              @error('password_confirmation')<div class="cv-error-text">{{ $message }}</div>@enderror
            </div>

            <button class="cv-btn-orange w-100" type="submit">Create Account</button>

            <p class="text-center text-muted fw-bold mt-4 mb-0">
              Already registered?
              <a href="{{ route('login') }}" class="cv-auth-link">Log in</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection
