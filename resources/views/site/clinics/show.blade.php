@extends('layouts.site')

@section('title', $clinic->name . ' - Clinic Details')

@section('content')
<main class="main">

  {{-- Page Title --}}
  <div class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="heading-title">{{ $clinic->name }}</h1>

            {{-- show tagline first, fallback to short services excerpt --}}
            <p class="mb-0">
              {{ $clinic->tagline
                  ?: ($clinic->services
                        ? \Illuminate\Support\Str::limit($clinic->services, 180)
                        : 'Clinic profile details will be updated soon. You can book an appointment and the clinic will confirm availability.') }}
            </p>
          </div>
        </div>
      </div>
    </div>

    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ route('site.home') }}">Home</a></li>
          <li><a href="{{ route('clinics.index') }}">Clinics</a></li>
          <li class="current">{{ $clinic->name }}</li>
        </ol>
      </div>
    </nav>
  </div>
  {{-- End Page Title --}}

  @php
    $photoUrl = $clinic->photo_path
      ? asset('storage/' . $clinic->photo_path)
      : asset('assets/site/img/health/neurology-2.webp');

    $hasCoords = !empty($clinic->latitude) && !empty($clinic->longitude);

    // destination for google maps
    $destination = $hasCoords
      ? ($clinic->latitude . ',' . $clinic->longitude)
      : ($clinic->address ?: $clinic->name);

    $destinationEncoded = urlencode($destination);

    // embed URL (no API key)
    $googleEmbedSrc = $hasCoords
      ? "https://www.google.com/maps?q={$destinationEncoded}&output=embed"
      : "https://www.google.com/maps?q={$destinationEncoded}&output=embed";

    // directions URL
    $directionsUrl = "https://www.google.com/maps/dir/?api=1&destination={$destinationEncoded}";
  @endphp

  {{-- Clinic Details Section --}}
  <section id="clinic-details" class="department-details section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row">
        <div class="col-xl-6 col-lg-7">
          <div class="department-hero" data-aos="fade-right" data-aos-delay="200">
            <div class="badge-wrap">
              <span class="specialty-badge">
                {{ $clinic->price_range ?: 'General Dentistry' }}
              </span>
            </div>

            <h1 class="department-title">
              {{ $clinic->tagline ?? 'Quality Dental Care' }}
            </h1>

            <p class="department-intro">
              {{ $clinic->about
                  ?? ($clinic->address
                        ? "Located at {$clinic->address}."
                        : 'Clinic profile details will be updated soon.') }}
            </p>

            <div class="key-highlights">
              <div class="highlight-item">
                <span class="highlight-number">Hours</span>
                <span class="highlight-text">
                  {{ $clinic->working_hours ?: 'Working hours not provided yet.' }}
                </span>
              </div>

              <div class="highlight-item">
                <span class="highlight-number">
                  {{ $clinic->dentists?->count() ?: '—' }}
                </span>
                <span class="highlight-text">Dentists</span>
              </div>

              <div class="highlight-item">
                <span class="highlight-number">Contact</span>
                <span class="highlight-text">
                  {{ $clinic->phone ?: 'Phone not provided yet.' }}
                </span>
              </div>
            </div>

            <div class="action-group">
              <a href="#booking" class="btn-primary">Book Appointment</a>
              <a href="#directions" class="btn-secondary">
                <span>Get Directions</span>
                <i class="bi bi-geo-alt"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-5">
          <div class="department-visual" data-aos="fade-left" data-aos-delay="300">
            <div class="image-container">
              {{-- ✅ Storefront photo --}}
              <img src="{{ $photoUrl }}"
                   alt="{{ $clinic->name }}"
                   class="img-fluid primary-image">

              <div class="floating-card" data-aos="zoom-in" data-aos-delay="500">
                <div class="card-icon">
                  <i class="bi bi-hospital"></i>
                </div>
                <div class="card-content">
                  <h4>{{ $clinic->name }}</h4>
                  <p>{{ $clinic->address ?: 'Address will be provided soon.' }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- ✅ Services overview (generated from clinic->services) --}}
      <div class="services-overview" data-aos="fade-up" data-aos-delay="400">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="overview-header">
              <h3>Services</h3>
              <p>
                {{ $clinic->services
                    ? 'Explore services offered at this clinic.'
                    : 'Services list will be updated soon. For now you can request an appointment and specify what you need.' }}
              </p>
            </div>
          </div>
        </div>

        @php
          $rawServices = $clinic->services ?? '';
          $serviceLines = collect(preg_split("/\r\n|\n|\r/", $rawServices))
              ->map(fn ($s) => trim($s))
              ->filter()
              ->values();

          $icons = [
              'bi bi-stars',
              'bi bi-emoji-smile',
              'bi bi-tools',
              'bi bi-shield-check',
              'bi bi-bandaid',
              'bi bi-gem',
              'bi bi-heart-pulse',
              'bi bi-patch-check',
              'bi bi-brightness-high',
          ];

          $servicesParsed = $serviceLines->map(function ($line, $idx) use ($icons) {
              $parts = preg_split('/\s-\s/', $line, 2);
              $title = trim($parts[0] ?? '');
              $text  = trim($parts[1] ?? '');

              return [
                  'icon' => $icons[$idx % count($icons)],
                  'title' => $title,
                  'text' => $text,
              ];
          });
        @endphp

        <div class="row gy-4 services-grid">
          @if ($servicesParsed->count())
            @foreach ($servicesParsed as $i => $s)
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 500 + ($i * 50) }}">
                <div class="service-item">
                  <div class="service-icon">
                    <i class="{{ $s['icon'] }}"></i>
                  </div>
                  <h4>{{ $s['title'] }}</h4>

                  @if (!empty($s['text']))
                    <p>{{ $s['text'] }}</p>
                  @else
                    <p class="text-muted">Service available at this clinic.</p>
                  @endif
                </div>
              </div>
            @endforeach
          @else
            <div class="col-12">
              <div class="service-item">
                <h4>Services</h4>
                <p class="mb-0">
                  Services list will be updated soon. For now you can request an appointment and specify what you need.
                </p>
              </div>
            </div>
          @endif
        </div>
      </div>

      {{-- ✅ Directions / Map --}}
      <div id="directions" class="expert-care-section" data-aos="fade-up" data-aos-delay="650">
        <div class="row align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="700">
            <div class="expert-content">
              <h3>Directions</h3>
              <p class="lead mb-2">
                {{ $clinic->address ?: 'Address not provided yet.' }}
              </p>

              <p class="mb-4">
                @if ($hasCoords)
                  Location coordinates are available for accurate directions.
                @else
                  Directions will use the clinic address/name (add coordinates later for best accuracy).
                @endif
              </p>

              <a class="btn btn-primary" href="{{ $directionsUrl }}" target="_blank" rel="noopener">
                Open Google Maps Directions
              </a>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="700">
            <div class="expert-image" style="border-radius:16px; overflow:hidden;">
              <iframe
                src="{{ $googleEmbedSrc }}"
                width="100%"
                height="380"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>

      {{-- Booking --}}
      <div id="booking" class="expert-care-section" data-aos="fade-up" data-aos-delay="800">
        <div class="row align-items-center">
          <div class="col-lg-5" data-aos="fade-right" data-aos-delay="900">
            <div class="expert-image">
              <img src="{{ asset('assets/site/img/health/neurology-4.webp') }}"
                   alt="Booking"
                   class="img-fluid">
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="900">
            <div class="expert-content">
              <h3>Book an Appointment</h3>
              <p class="lead">
                Choose a date/time and optionally a preferred dentist. If you don’t choose one, the clinic can assign an available dentist.
              </p>

              @guest
                <div class="alert alert-info mb-0">
                  Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">create an account</a> to book.
                </div>
              @endguest

              @auth
                <form method="POST" action="{{ route('appointments.store', $clinic) }}">
                  @csrf

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="appointment_at" class="form-label">Date & Time</label>
                      <input type="datetime-local"
                             name="appointment_at"
                             id="appointment_at"
                             class="form-control @error('appointment_at') is-invalid @enderror"
                             value="{{ old('appointment_at') }}"
                             required>
                      @error('appointment_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="dentist_id" class="form-label">Preferred Dentist (optional)</label>
                      <select name="dentist_id" id="dentist_id" class="form-select @error('dentist_id') is-invalid @enderror">
                        <option value="">Any available dentist</option>
                        @foreach ($clinic->dentists as $dentist)
                          <option value="{{ $dentist->id }}" {{ old('dentist_id') == $dentist->id ? 'selected' : '' }}>
                            {{ $dentist->full_name }}
                          </option>
                        @endforeach
                      </select>
                      @error('dentist_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="service" class="form-label">Service (optional)</label>
                    <input type="text"
                           name="service"
                           id="service"
                           class="form-control @error('service') is-invalid @enderror"
                           value="{{ old('service') }}"
                           placeholder="e.g. Cleaning, Filling, Braces...">
                    @error('service')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="notes" class="form-label">Notes (optional)</label>
                    <textarea name="notes"
                              id="notes"
                              class="form-control @error('notes') is-invalid @enderror"
                              rows="3"
                              placeholder="Any extra details...">{{ old('notes') }}</textarea>
                    @error('notes')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-primary">
                    Submit Booking
                  </button>
                </form>
              @endauth

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  {{-- /Clinic Details Section --}}

</main>
@endsection