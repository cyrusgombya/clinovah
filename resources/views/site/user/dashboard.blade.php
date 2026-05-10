{{-- =========================================================
FILE 1: resources/views/site/user/dashboard.blade.php
Clinovah themed user dashboard
========================================================= --}}

@extends('layouts.site')

@section('title', 'My Dashboard | Clinovah')

@section('content')

@push('styles')
<style>
  .cv-dashboard-hero {
    padding: 54px 0 34px;
    background:
      radial-gradient(circle at 12% 10%, rgba(255, 142, 7, 0.12), transparent 26%),
      radial-gradient(circle at 88% 20%, rgba(14, 82, 63, 0.12), transparent 30%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
  }

  .cv-dashboard-title {
    color: var(--cv-dark);
    font-weight: 950;
    letter-spacing: -1.8px;
    font-size: clamp(36px, 5vw, 64px);
    line-height: 1;
  }

  .cv-dashboard-title span {
    color: var(--cv-orange);
  }

  .cv-dashboard-text {
    color: var(--cv-muted);
    font-size: 17px;
    line-height: 1.7;
    max-width: 650px;
  }

  .cv-dashboard-section {
    padding: 44px 0 78px;
  }

  .cv-dash-card {
    height: 100%;
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 24px;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.07);
  }

  .cv-stat-card {
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 28px;
    padding: 22px;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.06);
  }

  .cv-stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 18px;
    display: grid;
    place-items: center;
    background: var(--cv-mint);
    color: var(--cv-green);
    font-size: 24px;
    margin-bottom: 14px;
  }

  .cv-stat-card.orange .cv-stat-icon {
    background: var(--cv-cream);
    color: var(--cv-orange);
  }

  .cv-stat-card strong {
    display: block;
    font-size: 32px;
    line-height: 1;
    color: var(--cv-dark);
    font-weight: 950;
  }

  .cv-stat-card span {
    color: var(--cv-muted);
    font-weight: 800;
    font-size: 13px;
  }

  .cv-appointment-card {
    border: 1px solid var(--cv-border);
    border-radius: 24px;
    padding: 18px;
    background: #fbfdfb;
  }

  .cv-appointment-date {
    width: 64px;
    height: 64px;
    border-radius: 20px;
    background: var(--cv-green);
    color: #fff;
    display: grid;
    place-items: center;
    text-align: center;
    flex: 0 0 64px;
    font-weight: 950;
    line-height: 1.05;
  }

  .cv-appointment-date small {
    display: block;
    font-size: 11px;
    opacity: .8;
    text-transform: uppercase;
  }

  .cv-status-pill {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    padding: 6px 10px;
    font-size: 12px;
    font-weight: 900;
    text-transform: capitalize;
  }

  .cv-status-pending { background: #fff7ed; color: #c05600; }
  .cv-status-confirmed { background: #e8f5ef; color: var(--cv-green); }
  .cv-status-cancelled { background: #fee2e2; color: #b91c1c; }
  .cv-status-no_show { background: #f1f5f9; color: #475569; }

  .cv-empty-box {
    text-align: center;
    border: 1px dashed #cfe0d6;
    border-radius: 26px;
    padding: 34px 20px;
    background: #fbfdfb;
  }

  .cv-empty-icon {
    width: 68px;
    height: 68px;
    border-radius: 24px;
    background: var(--cv-mint);
    display: grid;
    place-items: center;
    font-size: 32px;
    margin: 0 auto 14px;
  }

  .cv-quick-link {
    display: flex;
    align-items: center;
    gap: 12px;
    border: 1px solid var(--cv-border);
    border-radius: 22px;
    padding: 16px;
    color: var(--cv-dark);
    font-weight: 900;
    background: #fff;
  }

  .cv-quick-link:hover {
    color: var(--cv-green);
    background: #fbfdfb;
  }

  .cv-quick-icon {
    width: 44px;
    height: 44px;
    border-radius: 16px;
    background: var(--cv-mint);
    display: grid;
    place-items: center;
    color: var(--cv-green);
    font-size: 22px;
  }
</style>
@endpush

<main>
  <section class="cv-dashboard-hero">
    <div class="container">
      <h1 class="cv-dashboard-title">Hi, {{ auth()->user()->name ?? 'there' }} <span>👋</span></h1>
      <p class="cv-dashboard-text mb-0">Manage your appointments, check clinic responses, and continue your healthcare booking journey.</p>
    </div>
  </section>

  <section class="cv-dashboard-section">
    <div class="container">
      @php
        $pendingCount = $upcoming->where('status', 'pending')->count();
        $confirmedCount = $upcoming->where('status', 'confirmed')->count();
        $nextAppointment = $upcoming->first();
      @endphp

      <div class="row g-4 mb-4">
        <div class="col-md-4">
          <div class="cv-stat-card">
            <div class="cv-stat-icon"><i class="ri-calendar-check-line"></i></div>
            <strong>{{ $upcoming->count() }}</strong>
            <span>Upcoming appointments</span>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cv-stat-card orange">
            <div class="cv-stat-icon"><i class="ri-time-line"></i></div>
            <strong>{{ $pendingCount }}</strong>
            <span>Pending confirmation</span>
          </div>
        </div>

        <div class="col-md-4">
          <div class="cv-stat-card">
            <div class="cv-stat-icon"><i class="ri-verified-badge-line"></i></div>
            <strong>{{ $confirmedCount }}</strong>
            <span>Confirmed appointments</span>
          </div>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-8">
          <div class="cv-dash-card">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
              <div>
                <h3 class="fw-bold mb-1">Upcoming appointments</h3>
                <p class="text-muted mb-0">Your next clinic visits and pending requests.</p>
              </div>
              <a href="{{ route('dashboard.appointments') }}" class="cv-btn-light">View all</a>
            </div>

            @if ($upcoming->count() === 0)
              <div class="cv-empty-box">
                <div class="cv-empty-icon">📅</div>
                <h5 class="fw-bold">No upcoming appointments</h5>
                <p class="text-muted mb-3">Start by finding a clinic and submitting a booking request.</p>
                <a href="{{ route('clinics.index') }}" class="cv-btn-orange">Find a Clinic</a>
              </div>
            @else
              <div class="d-grid gap-3">
                @foreach ($upcoming as $a)
                  @php
                    $statusClass = 'cv-status-' . str_replace('-', '_', $a->status);
                  @endphp

                  <div class="cv-appointment-card d-flex gap-3 align-items-center flex-wrap flex-sm-nowrap">
                    <div class="cv-appointment-date">
                      <div>
                        <small>{{ $a->appointment_at?->format('M') }}</small>
                        {{ $a->appointment_at?->format('d') }}
                      </div>
                    </div>

                    <div class="flex-grow-1">
                      <h5 class="fw-bold mb-1">{{ $a->clinic?->name ?? 'Clinic not available' }}</h5>
                      <p class="text-muted mb-1">
                        {{ $a->appointment_at?->format('D, M d Y · h:i A') }}
                      </p>
                      <small class="text-muted">{{ $a->dentist?->full_name ?? 'Any available specialist' }}</small>
                    </div>

                    <span class="cv-status-pill {{ $statusClass }}">{{ $a->status }}</span>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>

        <div class="col-lg-4">
          <div class="cv-dash-card">
            <h4 class="fw-bold mb-3">Quick actions</h4>

            <div class="d-grid gap-3">
              <a href="{{ route('clinics.index') }}" class="cv-quick-link">
                <span class="cv-quick-icon"><i class="ri-search-line"></i></span>
                Find clinics
              </a>

              <a href="{{ route('dashboard.appointments') }}" class="cv-quick-link">
                <span class="cv-quick-icon"><i class="ri-calendar-check-line"></i></span>
                My bookings
              </a>

              <a href="{{ route('profile.edit') }}" class="cv-quick-link">
                <span class="cv-quick-icon"><i class="ri-user-settings-line"></i></span>
                Profile settings
              </a>
            </div>
          </div>

          @if ($nextAppointment)
            <div class="cv-dash-card mt-4">
              <h4 class="fw-bold mb-2">Next appointment</h4>
              <p class="text-muted mb-3">{{ $nextAppointment->clinic?->name }}</p>
              <div class="cv-appointment-date mb-3">
                <div>
                  <small>{{ $nextAppointment->appointment_at?->format('M') }}</small>
                  {{ $nextAppointment->appointment_at?->format('d') }}
                </div>
              </div>
              <p class="fw-bold mb-0">{{ $nextAppointment->appointment_at?->format('h:i A') }}</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
</main>

@endsection