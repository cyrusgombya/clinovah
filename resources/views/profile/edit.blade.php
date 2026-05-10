{{-- =========================================================
FILE: resources/views/profile/edit.blade.php
Clinovah themed profile page
========================================================= --}}

@extends('layouts.site')

@section('title', 'Profile Settings | Clinovah')

@section('content')

@push('styles')
<style>
  .cv-profile-hero {
    padding: 52px 0 34px;
    background:
      radial-gradient(circle at 12% 10%, rgba(255, 142, 7, 0.12), transparent 26%),
      radial-gradient(circle at 88% 20%, rgba(14, 82, 63, 0.12), transparent 30%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
  }

  .cv-profile-title {
    color: var(--cv-dark);
    font-weight: 950;
    letter-spacing: -1.8px;
    font-size: clamp(36px, 5vw, 60px);
    line-height: 1;
  }

  .cv-profile-title span {
    color: var(--cv-orange);
  }

  .cv-profile-section {
    padding: 42px 0 78px;
  }

  .cv-profile-card,
  .cv-profile-side-card {
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 24px;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.07);
  }

  .cv-profile-side-card {
    position: sticky;
    top: 96px;
  }

  .cv-profile-avatar {
    width: 84px;
    height: 84px;
    border-radius: 28px;
    background: var(--cv-green);
    color: #fff;
    display: grid;
    place-items: center;
    font-size: 34px;
    font-weight: 950;
    box-shadow: 0 16px 40px rgba(14, 82, 63, 0.22);
  }

  .cv-profile-mini-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px;
    border-radius: 20px;
    color: var(--cv-dark);
    font-weight: 900;
    background: #fbfdfb;
    border: 1px solid var(--cv-border);
  }

  .cv-profile-mini-link:hover {
    color: var(--cv-green);
  }

  .cv-profile-mini-icon {
    width: 42px;
    height: 42px;
    border-radius: 15px;
    display: grid;
    place-items: center;
    background: var(--cv-mint);
    color: var(--cv-green);
    font-size: 20px;
  }

  .cv-profile-card h2,
  .cv-profile-card h3,
  .cv-profile-card header h2 {
    color: var(--cv-dark) !important;
    font-weight: 950 !important;
    letter-spacing: -0.7px;
    font-size: 24px !important;
  }

  .cv-profile-card p,
  .cv-profile-card header p {
    color: var(--cv-muted) !important;
    line-height: 1.65;
  }

  .cv-profile-card label {
    color: var(--cv-dark) !important;
    font-weight: 900 !important;
    margin-bottom: 8px;
  }

  .cv-profile-card input[type="text"],
  .cv-profile-card input[type="email"],
  .cv-profile-card input[type="password"] {
    width: 100% !important;
    min-height: 54px;
    border: 1px solid #dce9e2 !important;
    border-radius: 18px !important;
    padding: 0 16px !important;
    color: var(--cv-dark) !important;
    font-weight: 700;
    box-shadow: none !important;
    outline: none !important;
  }

  .cv-profile-card input:focus {
    border-color: var(--cv-green) !important;
    box-shadow: 0 0 0 4px rgba(14, 82, 63, 0.08) !important;
  }

  .cv-profile-card button,
  .cv-profile-card .inline-flex.items-center,
  .cv-profile-card [type="submit"] {
    min-height: 46px;
    border-radius: 999px !important;
    padding: 0 22px !important;
    font-weight: 900 !important;
    border: 0 !important;
    background: var(--cv-green) !important;
    color: #fff !important;
    box-shadow: 0 14px 35px rgba(14, 82, 63, 0.16);
  }

  .cv-profile-card .text-red-600,
  .cv-profile-card .text-red-700,
  .cv-profile-card .text-red-800 {
    color: #b91c1c !important;
  }

  .cv-danger-card {
    border-color: #fee2e2;
  }

  .cv-danger-card button,
  .cv-danger-card [type="submit"] {
    background: #dc2626 !important;
  }

  .cv-profile-card .mt-6,
  .cv-profile-card .mt-4,
  .cv-profile-card .mt-2 {
    margin-top: 1rem !important;
  }

  .cv-profile-card .space-y-6 > * + * {
    margin-top: 1rem !important;
  }

  @media (max-width: 991px) {
    .cv-profile-side-card {
      position: static;
    }
  }
</style>
@endpush

<main>
  <section class="cv-profile-hero">
    <div class="container">
      <a href="{{ route('dashboard') }}" class="cv-btn-light mb-3">← Back to dashboard</a>
      <h1 class="cv-profile-title">Profile <span>settings</span></h1>
      <p class="text-muted mb-0">Manage your account details, password, and account access.</p>
    </div>
  </section>

  <section class="cv-profile-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <aside class="cv-profile-side-card">
            <div class="cv-profile-avatar mb-3">
              {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>

            <h4 class="fw-bold mb-1">{{ auth()->user()->name ?? 'User' }}</h4>
            <p class="text-muted mb-4">{{ auth()->user()->email ?? 'No email available' }}</p>

            <div class="d-grid gap-3">
              <a href="{{ route('dashboard') }}" class="cv-profile-mini-link">
                <span class="cv-profile-mini-icon"><i class="ri-dashboard-line"></i></span>
                Dashboard
              </a>

              <a href="{{ route('dashboard.appointments') }}" class="cv-profile-mini-link">
                <span class="cv-profile-mini-icon"><i class="ri-calendar-check-line"></i></span>
                My Bookings
              </a>

              <a href="{{ route('clinics.index') }}" class="cv-profile-mini-link">
                <span class="cv-profile-mini-icon"><i class="ri-search-line"></i></span>
                Find Clinics
              </a>
            </div>
          </aside>
        </div>

        <div class="col-lg-8">
          <div class="d-grid gap-4">
            <div class="cv-profile-card">
              @include('profile.partials.update-profile-information-form')
            </div>

            <div class="cv-profile-card">
              @include('profile.partials.update-password-form')
            </div>

            <div class="cv-profile-card cv-danger-card">
              @include('profile.partials.delete-user-form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection