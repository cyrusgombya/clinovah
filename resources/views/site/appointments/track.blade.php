@extends('layouts.site')

@section('title', 'Track Booking | Clinovah')

@section('content')

<main style="background:#fbfdfb;">
  <section style="padding:70px 0;background:linear-gradient(180deg,#fff 0%,#f3fbf7 100%);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">

          <div style="background:#fff;border:1px solid #e5eee8;border-radius:34px;padding:34px;box-shadow:0 30px 90px rgba(14,82,63,.12);">
            <h1 style="font-weight:950;color:#163229;">Track your <span style="color:#ff8e07;">booking</span></h1>
            <p class="text-muted mb-4">Enter your booking reference and the phone number or email used during booking.</p>

            @if ($errors->any())
              <div class="alert alert-danger rounded-4 border-0">
                @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
                @endforeach
              </div>
            @endif

            <form method="POST" action="{{ route('appointments.track.search') }}" class="mb-4">
              @csrf

              <div class="row g-3">
                <div class="col-md-6">
                  <label class="fw-bold mb-2">Booking Reference</label>
                  <input type="text" name="booking_reference" value="{{ old('booking_reference') }}"
                         class="form-control" placeholder="e.g. CLN-260510-ABCDE"
                         style="height:56px;border-radius:18px;">
                </div>

                <div class="col-md-6">
                  <label class="fw-bold mb-2">Phone or Email</label>
                  <input type="text" name="contact" value="{{ old('contact') }}"
                         class="form-control" placeholder="Phone number or email"
                         style="height:56px;border-radius:18px;">
                </div>

                <div class="col-12">
                  <button type="submit" class="cv-btn-orange">Track Booking</button>
                </div>
              </div>
            </form>

            @isset($appointment)
              <div class="p-4 rounded-4" style="background:#fbfdfb;border:1px solid #e5eee8;">
                <h4 class="fw-bold mb-3">Booking Details</h4>

                <div class="row g-3">
                  <div class="col-md-6">
                    <small class="text-muted fw-bold">Clinic</small>
                    <p class="fw-bold mb-0">{{ $appointment->clinic?->name }}</p>
                  </div>

                  <div class="col-md-6">
                    <small class="text-muted fw-bold">Status</small>
                    <p class="fw-bold text-capitalize mb-0">{{ $appointment->status }}</p>
                  </div>

                  <div class="col-md-6">
                    <small class="text-muted fw-bold">Date & Time</small>
                    <p class="fw-bold mb-0">{{ $appointment->appointment_at?->format('D, M d Y · h:i A') }}</p>
                  </div>

                  <div class="col-md-6">
                    <small class="text-muted fw-bold">Specialist</small>
                    <p class="fw-bold mb-0">{{ $appointment->dentist?->full_name ?? 'Any available specialist' }}</p>
                  </div>

                  <div class="col-md-6">
                    <small class="text-muted fw-bold">Service</small>
                    <p class="fw-bold mb-0">{{ $appointment->service ?: 'Not specified' }}</p>
                  </div>

                  <div class="col-md-6">
                    <small class="text-muted fw-bold">Reference</small>
                    <p class="fw-bold mb-0">{{ $appointment->booking_reference }}</p>
                  </div>
                </div>
              </div>
            @endisset

          </div>

        </div>
      </div>
    </div>
  </section>
</main>

@endsection