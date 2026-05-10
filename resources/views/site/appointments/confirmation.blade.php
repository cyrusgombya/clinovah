@extends('layouts.site')

@section('title', 'Appointment Submitted | Clinovah')

@section('content')

@push('styles')
<style>
  .cv-confirm-page {
    min-height: 70vh;
    background:
      radial-gradient(circle at 12% 10%, rgba(255, 142, 7, 0.12), transparent 26%),
      radial-gradient(circle at 88% 20%, rgba(14, 82, 63, 0.12), transparent 30%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
    padding: 70px 0;
  }

  .cv-confirm-card {
    background: rgba(255, 255, 255, 0.96);
    border: 1px solid var(--cv-border);
    border-radius: 34px;
    padding: 34px;
    box-shadow: 0 30px 90px rgba(14, 82, 63, 0.13);
  }

  .cv-confirm-icon {
    width: 82px;
    height: 82px;
    border-radius: 28px;
    background: var(--cv-mint);
    color: var(--cv-green);
    display: grid;
    place-items: center;
    font-size: 42px;
    font-weight: 950;
    margin-bottom: 20px;
  }

  .cv-confirm-title {
    color: var(--cv-dark);
    font-size: clamp(34px, 5vw, 56px);
    line-height: 1;
    letter-spacing: -1.8px;
    font-weight: 950;
  }

  .cv-confirm-title span {
    color: var(--cv-orange);
  }

  .cv-confirm-text {
    color: var(--cv-muted);
    line-height: 1.75;
    font-size: 16px;
  }

  .cv-info-box {
    height: 100%;
    background: #fbfdfb;
    border: 1px solid var(--cv-border);
    border-radius: 24px;
    padding: 18px;
  }

  .cv-info-box small {
    color: var(--cv-muted);
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .4px;
    font-size: 11px;
  }

  .cv-info-box p {
    color: var(--cv-dark);
    font-weight: 900;
    margin: 5px 0 0;
  }

  .cv-status-pill {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    padding: 7px 11px;
    font-size: 12px;
    font-weight: 950;
    text-transform: capitalize;
    background: #fff7ed;
    color: #c05600;
  }

  .cv-next-box {
    background: linear-gradient(135deg, var(--cv-green), #07352a);
    color: #fff;
    border-radius: 28px;
    padding: 24px;
  }

  .cv-next-box p {
    color: rgba(255,255,255,.75);
  }
</style>
@endpush

<main class="cv-confirm-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-9 col-lg-10">
        <div class="cv-confirm-card">
          <div class="cv-confirm-icon">✓</div>

          <h1 class="cv-confirm-title">Appointment request <span>submitted</span></h1>
          <p class="cv-confirm-text mb-4">
            Your booking request has been sent to the clinic. The clinic will review it and confirm your appointment.
          </p>

          @if (session('success'))
            <div class="alert alert-success rounded-4 border-0 fw-bold">{{ session('success') }}</div>
          @endif

          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <div class="cv-info-box">
                <small>Booking Reference</small>
                <p>{{ $appointment->booking_reference ?? 'CLN-' . str_pad($appointment->id, 5, '0', STR_PAD_LEFT) }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="cv-info-box">
                <small>Status</small><br>
                <span class="cv-status-pill">{{ $appointment->status }}</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="cv-info-box">
                <small>Clinic</small>
                <p>{{ $appointment->clinic?->name ?? 'Clinic not available' }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="cv-info-box">
                <small>Date & Time</small>
                <p>{{ $appointment->appointment_at?->format('D, M d Y · h:i A') }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="cv-info-box">
                <small>Specialist</small>
                <p>{{ $appointment->dentist?->full_name ?? 'Any available specialist' }}</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="cv-info-box">
                <small>Service</small>
                <p>{{ $appointment->service ?: 'Not specified' }}</p>
              </div>
            </div>
          </div>

          <div class="cv-next-box mb-4">
            <h4 class="fw-bold mb-2">What happens next?</h4>
            <p class="mb-0">
              The clinic will confirm, assign a specialist if needed, or contact you if they need more information. Please arrive at least 10 minutes early once confirmed.
            </p>
          </div>

          <div class="d-flex flex-wrap gap-2">
            @auth
              <a href="{{ route('dashboard.appointments') }}" class="cv-btn-green">View My Bookings</a>
            @else
              <a href="{{ route('register') }}" class="cv-btn-green">Create Account to Track Bookings</a>
            @endauth

            <a href="{{ route('clinics.index') }}" class="cv-btn-light">Find Another Clinic</a>
            <a href="{{ route('site.home') }}" class="cv-btn-light">Back Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection