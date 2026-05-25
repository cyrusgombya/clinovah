


{{-- =========================================================
FILE 2: resources/views/site/user/appointments.blade.php
Clinovah themed user appointments list
========================================================= --}}

@extends('layouts.site')

@section('title', 'My Appointments | Clinovah')

@section('content')

@push('styles')
<style>
  .cv-list-hero {
    padding: 50px 0 34px;
    background:
      radial-gradient(circle at 12% 10%, rgba(255, 142, 7, 0.12), transparent 26%),
      radial-gradient(circle at 88% 20%, rgba(14, 82, 63, 0.12), transparent 30%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
  }

  .cv-list-title {
    color: var(--cv-dark);
    font-weight: 950;
    letter-spacing: -1.8px;
    font-size: clamp(36px, 5vw, 60px);
    line-height: 1;
  }

  .cv-list-title span { color: var(--cv-orange); }

  .cv-list-section { padding: 42px 0 78px; }

  .cv-table-card {
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 22px;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.07);
  }

  .cv-appointment-row {
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
    padding: 40px 20px;
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
</style>
@endpush

<main>
  <section class="cv-list-hero">
    <div class="container">
      <a href="{{ route('dashboard') }}" class="cv-btn-light mb-3">← Back to dashboard</a>
      <h1 class="cv-list-title">My <span>appointments</span></h1>
      <p class="text-muted mb-0">Track pending, confirmed, cancelled, and past clinic appointments.</p>
    </div>
  </section>

  <section class="cv-list-section">
    <div class="container">
      <div class="cv-table-card">
        @if (session('success'))
          <div class="alert alert-success rounded-4 border-0 fw-bold">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger rounded-4 border-0 fw-bold">
            @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
            @endforeach
          </div>
        @endif

        @forelse ($appointments as $a)
          @php
            $statusClass = 'cv-status-' . str_replace('-', '_', $a->status);
            $canCancel = in_array($a->status, ['pending', 'confirmed'], true) && $a->appointment_at?->isFuture();
          @endphp

          <div class="cv-appointment-row mb-3">
            <div class="d-flex gap-3 align-items-start flex-wrap flex-lg-nowrap">
              <div class="cv-appointment-date">
                <div>
                  <small>{{ $a->appointment_at?->format('M') }}</small>
                  {{ $a->appointment_at?->format('d') }}
                </div>
              </div>

              <div class="flex-grow-1">
                <div class="d-flex flex-wrap justify-content-between gap-2 mb-2">
                  <div>
                    <h5 class="fw-bold mb-1">{{ $a->clinic?->name ?? 'Clinic not available' }}</h5>
                    <p class="text-muted mb-1">{{ $a->appointment_at?->format('D, M d Y · h:i A') }}</p>
                    <small class="text-muted">{{ $a->dentist?->full_name ?? 'Any available specialist' }}</small>
                      <div class="text-muted small mt-1">
                        Ref: <strong>{{ $a->booking_reference }}</strong>
                      </div>
                  </div>

                  <span class="cv-status-pill {{ $statusClass }}">{{ $a->status }}</span>
                </div>

                @if ($a->service || $a->notes)
                  <div class="text-muted small mb-3">
                    @if ($a->service)<strong>Service:</strong> {{ $a->service }} @endif
                    @if ($a->notes)<br><strong>Notes:</strong> {{ $a->notes }} @endif
                  </div>
                @endif

                <div class="d-flex flex-wrap gap-2">
                  @if ($a->clinic)
                    <a href="{{ route('clinics.show', $a->clinic) }}" class="cv-btn-light">View Clinic</a>
                  @endif

                  @if ($canCancel)
                    <button class="cv-btn-orange" type="button" data-bs-toggle="collapse" data-bs-target="#cancelAppointment{{ $a->id }}">
                      Cancel Appointment
                    </button>
                  @endif
                </div>

                @if ($canCancel)
                  <div class="collapse mt-3" id="cancelAppointment{{ $a->id }}">
                    <form method="POST" action="{{ route('dashboard.appointments.cancel', $a) }}" class="p-3 rounded-4" style="background:#fff;border:1px solid var(--cv-border);">
                      @csrf
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="fw-bold mb-2">Reason</label>
                          <select name="cancellation_reason" class="form-select" required>
                            <option value="">Choose reason</option>
                            <option value="I cannot make it">I cannot make it</option>
                            <option value="I booked another clinic">I booked another clinic</option>
                            <option value="I need a different time">I need a different time</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="fw-bold mb-2">Note</label>
                          <input type="text" name="cancellation_note" class="form-control" placeholder="Optional note">
                        </div>
                        <div class="col-12">
                          <button type="submit" class="cv-btn-orange">Confirm Cancellation</button>
                        </div>
                      </div>
                    </form>
                  </div>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="cv-empty-box">
            <div class="cv-empty-icon">📅</div>
            <h5 class="fw-bold">No appointments yet</h5>
            <p class="text-muted mb-3">Book your first appointment from the clinics page.</p>
            <a href="{{ route('clinics.index') }}" class="cv-btn-orange">Find a Clinic</a>
          </div>
        @endforelse

        <div class="mt-4">
          {{ $appointments->links() }}
        </div>
      </div>
    </div>
  </section>
</main>

@endsection
