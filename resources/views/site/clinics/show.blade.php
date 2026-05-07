@extends('layouts.site')

@section('title', $clinic->name . ' - Clinic Details')

@section('content')

@php
  $photoUrl = $clinic->photo_path
    ? asset('storage/' . $clinic->photo_path)
    : asset('assets/images/others/doctor/doctor_1.jpg');

  $hasCoords = !empty($clinic->latitude) && !empty($clinic->longitude);

  $destination = $hasCoords
    ? ($clinic->latitude . ',' . $clinic->longitude)
    : ($clinic->address ?: $clinic->name);

  $destinationEncoded = urlencode($destination);
  $googleEmbedSrc = "https://www.google.com/maps?q={$destinationEncoded}&output=embed";
  $directionsUrl = "https://www.google.com/maps/dir/?api=1&destination={$destinationEncoded}";

  $rawServices = $clinic->services ?? '';
  $servicesParsed = collect(preg_split("/\r\n|\n|\r/", $rawServices))
    ->map(fn ($s) => trim($s))
    ->filter()
    ->values()
    ->map(function ($line) {
      $parts = preg_split('/\s-\s/', $line, 2);

      return [
        'title' => trim($parts[0] ?? ''),
        'text' => trim($parts[1] ?? ''),
      ];
    });
@endphp

<div class="breadcrumb-section">
  <div class="img-overlay">
    <div class="custom-container container">
      <div class="row g-0">
        <div class="col-12">
          <div class="page-title">
            <h3>{{ $clinic->name }}</h3>
          </div>
        </div>

        <div class="col-12">
          <div class="icon-breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('site.home') }}">
                  <svg>
                    <use xlink:href="{{ asset('assets/svg/home1.svg#home') }}"></use>
                  </svg>
                </a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('clinics.index') }}">Clinics</a>
              </li>
              <li class="breadcrumb-item active">{{ $clinic->name }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section>
  <div class="custom-container container">
    <div class="row team-details gy-lg-0 gy-sm-4 gy-3">

      <div class="col-xl-3 col-lg-4">
        <div class="left-sidebar custom-sticky">
          <div class="img">
            <img class="img-fluid w-100" src="{{ $photoUrl }}" alt="{{ $clinic->name }}">
          </div>

          <div class="content">
            <span class="sub-title">
              <span class="dot"></span>{{ $clinic->tagline ?: 'Specialized Healthcare' }}
            </span>

            <h4>{{ $clinic->name }}</h4>

            <p>
              {{ $clinic->about
                ?? 'This clinic provides specialized healthcare services and allows patients to book appointments easily through the platform.' }}
            </p>

            <ul class="details">
              <li>
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <div class="icon"><i class="ri-phone-fill"></i></div>
                  </div>
                  <div class="flex-grow-1">
                    <span>Phone Number :</span>
                    <p>{{ $clinic->phone ?: 'Not provided yet' }}</p>
                  </div>
                </div>
              </li>

              <li>
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <div class="icon"><i class="ri-mail-line"></i></div>
                  </div>
                  <div class="flex-grow-1">
                    <span>Email Address :</span>
                    <p>{{ $clinic->email ?: 'Not provided yet' }}</p>
                  </div>
                </div>
              </li>

              <li>
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <div class="icon"><i class="ri-map-pin-line"></i></div>
                  </div>
                  <div class="flex-grow-1">
                    <span>Address :</span>
                    <p>{{ $clinic->address ?: 'Address not set' }}</p>
                  </div>
                </div>
              </li>

              <li>
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <div class="icon"><i class="ri-time-line"></i></div>
                  </div>
                  <div class="flex-grow-1">
                    <span>Working Hours :</span>
                    <p>{{ $clinic->working_hours ?: 'Working hours not set' }}</p>
                  </div>
                </div>
              </li>
            </ul>

            <a href="#booking" class="btn btn-md sub-btn w-100 mt-3">
              Book Appointment
            </a>
          </div>
        </div>
      </div>

      <div class="col-xl-9 col-lg-8">
        <div class="right-sidebar">

          <h2>About {{ $clinic->name }}</h2>

          <p>
            {{ $clinic->about
              ?? ($clinic->address
                ? "Located at {$clinic->address}, {$clinic->name} offers specialized healthcare services with a focus on convenience, accessibility, and patient care."
                : "{$clinic->name} offers specialized healthcare services and makes it easy for patients to request appointments online.") }}
          </p>

          <p>
            You can review clinic information, check available services, and request an appointment directly from this page. Payments are handled directly at the clinic.
          </p>

          <div class="row gy-4">
            <div class="col-xxl-7 col-12">
              <div class="skills-box">
                <h4>Clinic Highlights</h4>
                <p>Helpful details to guide your booking decision.</p>

                <div class="progress-box">
                  <div class="parent-skill">
                    <div class="skill">
                      <div class="progress" data-progress="96">
                        <span class="progress-number">0%</span>
                      </div>
                    </div>
                    <span>Simple Booking Process</span>
                  </div>

                  <div class="parent-skill">
                    <div class="skill">
                      <div class="progress" data-progress="91">
                        <span class="progress-number">0%</span>
                      </div>
                    </div>
                    <span>Specialized Healthcare Access</span>
                  </div>

                  <div class="parent-skill">
                    <div class="skill">
                      <div class="progress" data-progress="88">
                        <span class="progress-number">0%</span>
                      </div>
                    </div>
                    <span>Clinic-Based Payments</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xxl-5 col-12">
              <div class="educational-box">
                <h4>Quick Information</h4>
                <p>Important clinic details at a glance.</p>

                <ul>
                  <li>
                    <span></span>
                    <div>
                      <h6>Price Range</h6>
                      <p>{{ $clinic->price_range ?: 'Not provided yet' }}</p>
                    </div>
                  </li>

                  <li>
                    <span></span>
                    <div>
                      <h6>Available Specialists</h6>
                      <p>{{ $clinic->dentists?->count() ?: 'Not listed yet' }}</p>
                    </div>
                  </li>

                  <li>
                    <span></span>
                    <div>
                      <h6>Booking</h6>
                      <p>Available with or without an account</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="educational-box mt-4">
            <h4>Services</h4>

            @if ($servicesParsed->count())
              <p>Explore some of the services offered at this clinic.</p>

              <ul>
                @foreach ($servicesParsed as $service)
                  <li class="align-items-baseline">
                    <span></span>
                    <p>
                      <strong>{{ $service['title'] }}</strong>
                      @if (!empty($service['text']))
                        - {{ $service['text'] }}
                      @endif
                    </p>
                  </li>
                @endforeach
              </ul>
            @else
              <p>Services list will be updated soon. You can still request an appointment and specify what you need.</p>
            @endif
          </div>

          <div class="educational-box mt-4">
            <h4>Location & Directions</h4>
            <p>{{ $clinic->address ?: 'Address not provided yet.' }}</p>

            <div style="border-radius: 16px; overflow: hidden; margin-bottom: 15px;">
              <iframe
                src="{{ $googleEmbedSrc }}"
                width="100%"
                height="320"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <a class="btn btn-md sub-btn-2" href="{{ $directionsUrl }}" target="_blank" rel="noopener">
              Open Google Maps Directions
            </a>
          </div>

          <h4 id="booking" class="mb-4 mt-4">Book An Appointment</h4>

          <form class="form-2" method="POST" action="{{ route('appointments.store', $clinic) }}">
            @csrf

            <div class="row gy-3">

              @guest
                <div class="col-md-6">
                  <label>Patient Name</label>
                  <input
                    type="text"
                    name="patient_name"
                    value="{{ old('patient_name') }}"
                    placeholder="Your name"
                    required>
                  @error('patient_name')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label>Email Address</label>
                  <input
                    type="email"
                    name="patient_email"
                    value="{{ old('patient_email') }}"
                    placeholder="Your email"
                    required>
                  @error('patient_email')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label>Phone Number</label>
                  <input
                    type="text"
                    name="patient_phone"
                    value="{{ old('patient_phone') }}"
                    placeholder="Your phone number"
                    required>
                  @error('patient_phone')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              @endguest

              <div class="col-md-6">
                <label>Date & Time</label>
                <input
                  type="datetime-local"
                  name="appointment_at"
                  value="{{ old('appointment_at') }}"
                  required>
                @error('appointment_at')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-6">
                <label>Preferred Specialist</label>
                <select name="dentist_id" class="form-select">
                  <option value="">Any available specialist</option>
                  @foreach ($clinic->dentists as $dentist)
                    <option value="{{ $dentist->id }}" {{ old('dentist_id') == $dentist->id ? 'selected' : '' }}>
                      {{ $dentist->full_name }}
                    </option>
                  @endforeach
                </select>
                @error('dentist_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-6">
                <label>Service</label>
                <input
                  type="text"
                  name="service"
                  value="{{ old('service') }}"
                  placeholder="e.g. Consultation, scan, therapy...">
                @error('service')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-12">
                <label>Notes</label>
                <textarea
                  name="notes"
                  cols="30"
                  rows="4"
                  placeholder="Tell the clinic what you need...">{{ old('notes') }}</textarea>
                @error('notes')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-12">
                <button class="btn btn-md sub-btn" type="submit">
                  Submit Booking
                </button>
              </div>

            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>

@endsection