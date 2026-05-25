@extends('layouts.clinic-otika')

@section('title', 'Clinic Profile')

@section('content')
  <div class="section-header">
    <h1>Clinic Profile</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active">
        <a href="{{ route('clinic.dashboard') }}">Dashboard</a>
      </div>

      <div class="breadcrumb-item">
        Profile
      </div>
    </div>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>

        {{ session('status') }}
      </div>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>

        {{ $errors->first() }}
      </div>
    </div>
  @endif

  @php
    $photoUrl = $clinic->photo_path
      ? asset('storage/' . $clinic->photo_path)
      : asset('assets/site/img/health/neurology-2.webp');

    $locationLocked = !empty($clinic->latitude) && !empty($clinic->longitude);

    $profileItems = collect([
      'Phone' => !empty($clinic->phone),
      'Address' => !empty($clinic->address),
      'Working hours' => !empty($clinic->working_hours),
      'Tagline' => !empty($clinic->tagline),
      'About' => !empty($clinic->about),
      'Services' => !empty($clinic->services),
      'Photo' => !empty($clinic->photo_path),
      'Location' => $locationLocked,
    ]);

    $completedItems = $profileItems->filter()->count();
    $profilePercent = round(($completedItems / $profileItems->count()) * 100);
  @endphp

  <div class="row">

    <div class="col-lg-5">

      {{-- PROFILE COMPLETENESS --}}
      <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>Profile Completeness</h4>

          <a href="{{ route('clinics.show', $clinic) }}"
             target="_blank"
             class="btn btn-sm btn-success">

            Public Preview

          </a>
        </div>

        <div class="card-body">

          <h2 class="mb-2">
            {{ $profilePercent }}%
          </h2>

          <div class="progress mb-3" style="height: 10px;">

            <div class="progress-bar bg-success"
                 role="progressbar"
                 style="width: {{ $profilePercent }}%;"
                 aria-valuenow="{{ $profilePercent }}"
                 aria-valuemin="0"
                 aria-valuemax="100">
            </div>

          </div>

          <p class="text-muted mb-3">
            Complete your profile so patients can trust your clinic before booking.
          </p>

          <div class="d-grid" style="gap:8px;">

            @foreach($profileItems as $label => $done)

              <div class="d-flex justify-content-between align-items-center">

                <span>{{ $label }}</span>

                @if($done)
                  <span class="badge badge-success">Done</span>
                @else
                  <span class="badge badge-warning">Missing</span>
                @endif

              </div>

            @endforeach

          </div>

        </div>
      </div>

      {{-- PHOTO --}}
      <div class="card">

        <div class="card-header">
          <h4>Storefront Photo</h4>
        </div>

        <div class="card-body">

          <img src="{{ $photoUrl }}"
               alt="Storefront photo"
               class="img-fluid mb-3"
               style="border-radius:12px;">

          <small class="text-muted d-block">
            Upload one clear photo of the clinic storefront.
            This appears on the public clinic page.
          </small>

        </div>
      </div>

      {{-- LOCATION --}}
      <div class="card">

        <div class="card-header">
          <h4>Clinic Location</h4>
        </div>

        <div class="card-body">

          @if ($locationLocked)

            <div class="alert alert-info">

              <strong>Location is already set.</strong><br>

              Saved coordinates:
              <strong>{{ $clinic->latitude }}, {{ $clinic->longitude }}</strong><br>

              This is locked from the clinic portal to avoid accidental map changes.

            </div>

          @else

            <div class="alert alert-warning">

              <strong>Important:</strong>

              Set this while physically at the clinic so Google Maps directions are accurate.

              Click “Use my current location”, then click “Save Changes”.

            </div>

            <button type="button"
                    class="btn btn-outline-primary"
                    id="btnUseLocation">

              Use my current location

            </button>

            <small class="text-muted d-block mt-2" id="geoStatus"></small>

          @endif

          <div class="form-group mt-3 mb-0">

            <label>Current saved coordinates</label>

            <input class="form-control"
                   value="{{ $locationLocked ? ($clinic->latitude . ', ' . $clinic->longitude) : 'Not set yet' }}"
                   disabled>

          </div>

        </div>
      </div>

    </div>

    <div class="col-lg-7">

      <div class="card">

        <div class="card-header">
          <h4>Edit Clinic Details</h4>
        </div>

        <div class="card-body">

          <form method="POST"
                action="{{ route('clinic.profile.update') }}"
                enctype="multipart/form-data">

            @csrf

            <input type="hidden"
                   name="latitude"
                   id="latitude"
                   value="{{ old('latitude') }}">

            <input type="hidden"
                   name="longitude"
                   id="longitude"
                   value="{{ old('longitude') }}">

            {{-- CLINIC NAME --}}
            <div class="form-group">

              <label>Clinic Name</label>

              <input type="text"
                     class="form-control"
                     value="{{ $clinic->name }}"
                     disabled>

            </div>

            {{-- PHONE --}}
            <div class="form-group">

              <label>Phone</label>

              <input type="text"
                     name="phone"
                     class="form-control @error('phone') is-invalid @enderror"
                     value="{{ old('phone', $clinic->phone) }}"
                     placeholder="e.g. +256 700 000000">

              @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            {{-- ADDRESS --}}
            <div class="form-group">

              <label>Address</label>

              <input type="text"
                     name="address"
                     class="form-control @error('address') is-invalid @enderror"
                     value="{{ old('address', $clinic->address) }}"
                     placeholder="e.g. Plot 12, Kampala Road">

              @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            {{-- WORKING HOURS --}}
            <div class="form-group">

              <label>Working Hours</label>

              <input type="text"
                     name="working_hours"
                     class="form-control @error('working_hours') is-invalid @enderror"
                     value="{{ old('working_hours', $clinic->working_hours) }}"
                     placeholder="e.g. Mon-Fri 8:00-18:00">

              @error('working_hours')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            {{-- AVAILABILITY --}}
            <div class="card border mt-4 mb-4">

              <div class="card-header">
                <h4 class="mb-0">Availability Settings</h4>
              </div>

              <div class="card-body">

                <div class="form-group">

                  <label>Available Days</label>

                  @php
                    $days = [
                      'monday',
                      'tuesday',
                      'wednesday',
                      'thursday',
                      'friday',
                      'saturday',
                      'sunday',
                    ];

                    $selectedDays = old(
                      'availability_days',
                      $clinic->availability_days ?? []
                    );
                  @endphp

                  <div class="d-flex flex-wrap" style="gap:10px;">

                    @foreach($days as $day)

                      <label class="border rounded px-3 py-2 mb-0">

                        <input type="checkbox"
                               name="availability_days[]"
                               value="{{ $day }}"
                               {{ in_array($day, $selectedDays) ? 'checked' : '' }}>

                        {{ ucfirst($day) }}

                      </label>

                    @endforeach

                  </div>

                  @error('availability_days')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                  @enderror

                </div>

                <div class="row">

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Opening Time</label>

                      <input type="time"
                             name="opening_time"
                             class="form-control @error('opening_time') is-invalid @enderror"
                             value="{{ old('opening_time', $clinic->opening_time) }}">

                      @error('opening_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Closing Time</label>

                      <input type="time"
                             name="closing_time"
                             class="form-control @error('closing_time') is-invalid @enderror"
                             value="{{ old('closing_time', $clinic->closing_time) }}">

                      @error('closing_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="form-group">

                      <label>Appointment Slot Length</label>

                      <select name="slot_minutes"
                              class="form-control @error('slot_minutes') is-invalid @enderror">

                        @foreach([15, 30, 45, 60, 90, 120] as $mins)

                          <option value="{{ $mins }}"
                            {{ (int) old('slot_minutes', $clinic->slot_minutes ?? 120) === $mins ? 'selected' : '' }}>

                            {{ $mins }} minutes

                          </option>

                        @endforeach

                      </select>

                      @error('slot_minutes')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror

                    </div>

                  </div>

                </div>

                <small class="text-muted">
                  These settings control when patients can book appointments.
                </small>

              </div>

            </div>

            {{-- PRICE RANGE --}}
            <div class="form-group">

              <label>Price Range</label>

              <select name="price_range"
                      class="form-control @error('price_range') is-invalid @enderror">

                <option value="">Select...</option>

                <option value="low"
                  {{ old('price_range', $clinic->price_range) === 'low' ? 'selected' : '' }}>
                  Low
                </option>

                <option value="medium"
                  {{ old('price_range', $clinic->price_range) === 'medium' ? 'selected' : '' }}>
                  Medium
                </option>

                <option value="high"
                  {{ old('price_range', $clinic->price_range) === 'high' ? 'selected' : '' }}>
                  High
                </option>

              </select>

              @error('price_range')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            {{-- TAGLINE --}}
            <div class="form-group">

              <label>Tagline</label>

              <input type="text"
                     name="tagline"
                     class="form-control @error('tagline') is-invalid @enderror"
                     value="{{ old('tagline', $clinic->tagline) }}"
                     placeholder="Short line shown publicly">

              @error('tagline')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            {{-- ABOUT --}}
            <div class="form-group">

              <label>About</label>

              <textarea name="about"
                        rows="4"
                        class="form-control @error('about') is-invalid @enderror"
                        placeholder="Write a short paragraph about your clinic...">{{ old('about', $clinic->about) }}</textarea>

              @error('about')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>

            {{-- SERVICES --}}
            <div class="form-group">

              <label>Services</label>

              <textarea name="services"
                        rows="5"
                        class="form-control @error('services') is-invalid @enderror"
                        placeholder="List your services, one per line. Example: Whitening - Cosmetic teeth whitening">{{ old('services', $clinic->services) }}</textarea>

              @error('services')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              <small class="text-muted">
                Tip: one service per line. Use “Service Name - short description” for better public display.
              </small>

            </div>

            {{-- PHOTO --}}
            <div class="form-group">

              <label>Upload/Replace Storefront Photo</label>

              <input type="file"
                     name="photo"
                     class="form-control @error('photo') is-invalid @enderror"
                     accept="image/*">

              @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              <small class="text-muted">
                JPG/PNG up to 4MB.
              </small>

            </div>

            <button class="btn btn-primary" type="submit">
              Save Changes
            </button>

          </form>

        </div>
      </div>

    </div>

  </div>
@endsection

@push('scripts')
<script>
  (function () {

    const btn = document.getElementById('btnUseLocation');
    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');
    const status = document.getElementById('geoStatus');

    if (!btn) return;

    btn.addEventListener('click', function () {

      status.textContent = 'Requesting location permission...';

      if (!navigator.geolocation) {
        status.textContent = 'Geolocation is not supported by this browser.';
        return;
      }

      navigator.geolocation.getCurrentPosition(

        function (pos) {

          const lat = pos.coords.latitude;
          const lng = pos.coords.longitude;

          latInput.value = lat;
          lngInput.value = lng;

          status.textContent =
            'Location captured: ' +
            lat.toFixed(6) +
            ', ' +
            lng.toFixed(6) +
            '. Now click "Save Changes".';
        },

        function (err) {
          status.textContent = 'Could not get location: ' + err.message;
        },

        {
          enableHighAccuracy: true,
          timeout: 15000,
          maximumAge: 0
        }
      );
    });

  })();
</script>
@endpush