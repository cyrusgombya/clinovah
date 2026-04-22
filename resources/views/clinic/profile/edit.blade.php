@extends('layouts.clinic-otika')

@section('title', 'Clinic Profile')

@section('content')
  <div class="section-header">
    <h1>Clinic Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('clinic.dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>

  @if (session('status'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session('status') }}
      </div>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ $errors->first() }}
      </div>
    </div>
  @endif

  @php
    $photoUrl = $clinic->photo_path
      ? asset('storage/' . $clinic->photo_path)
      : asset('assets/site/img/health/neurology-2.webp');

    $locationLocked = !empty($clinic->latitude) && !empty($clinic->longitude);
  @endphp

  <div class="row">
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header">
          <h4>Storefront Photo</h4>
        </div>
        <div class="card-body">
          <img src="{{ $photoUrl }}" alt="Storefront photo" class="img-fluid mb-3" style="border-radius:12px;">
          <small class="text-muted d-block">
            Upload one clear photo of the clinic storefront. This appears on the public clinic page.
          </small>
        </div>
      </div>

      {{-- ✅ One-time location setup --}}
      <div class="card">
        <div class="card-header">
          <h4>Clinic Location (One-time Setup)</h4>
        </div>
        <div class="card-body">
          @if ($locationLocked)
            <div class="alert alert-info">
              Location is already set: <strong>{{ $clinic->latitude }}, {{ $clinic->longitude }}</strong><br>
              It cannot be changed from the clinic portal.
            </div>
          @else
            <div class="alert alert-warning">
              <strong>Important:</strong> Please set this while you are physically at the clinic (not from home),
              so Google Maps directions are accurate. Click “Use my current location”, then click “Save Changes”.
            </div>

            <button type="button" class="btn btn-outline-primary" id="btnUseLocation">
              Use my current location
            </button>

            <small class="text-muted d-block mt-2" id="geoStatus"></small>
          @endif

          <div class="form-group mt-3 mb-0">
            <label>Current saved coordinates</label>
            <input class="form-control" value="{{ $locationLocked ? ($clinic->latitude . ', ' . $clinic->longitude) : 'Not set yet' }}" disabled>
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
          <form method="POST" action="{{ route('clinic.profile.update') }}" enctype="multipart/form-data">
            @csrf

            {{-- ✅ hidden location fields MUST be inside the form --}}
            <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">

            <div class="form-group">
              <label>Clinic Name</label>
              <input type="text" class="form-control" value="{{ $clinic->name }}" disabled>
            </div>

            <div class="form-group">
              <label>Phone</label>
              <input
                type="text"
                name="phone"
                class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $clinic->phone) }}"
                placeholder="e.g. +256 700 000000"
              >
              @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Address</label>
              <input
                type="text"
                name="address"
                class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address', $clinic->address) }}"
                placeholder="e.g. Plot 12, Kampala Road"
              >
              @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Working Hours</label>
              <input
                type="text"
                name="working_hours"
                class="form-control @error('working_hours') is-invalid @enderror"
                value="{{ old('working_hours', $clinic->working_hours) }}"
                placeholder="e.g. Mon-Fri 8:00-18:00, Sat 9:00-13:00"
              >
              @error('working_hours')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Price Range</label>
              <select name="price_range" class="form-control @error('price_range') is-invalid @enderror">
                <option value="">Select...</option>
                <option value="low" {{ old('price_range', $clinic->price_range) === 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ old('price_range', $clinic->price_range) === 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ old('price_range', $clinic->price_range) === 'high' ? 'selected' : '' }}>High</option>
              </select>
              @error('price_range')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Tagline</label>
              <input
                type="text"
                name="tagline"
                class="form-control @error('tagline') is-invalid @enderror"
                value="{{ old('tagline', $clinic->tagline) }}"
                placeholder="Short line shown publicly"
              >
              @error('tagline')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>About (Paragraph)</label>
              <textarea
                name="about"
                rows="4"
                class="form-control @error('about') is-invalid @enderror"
                placeholder="Write a short paragraph about your clinic..."
              >{{ old('about', $clinic->about) }}</textarea>
              @error('about')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Services</label>
              <textarea
                name="services"
                rows="5"
                class="form-control @error('services') is-invalid @enderror"
                placeholder="List your services (one per line). Optional: Title - short description"
              >{{ old('services', $clinic->services) }}</textarea>
              @error('services')<div class="invalid-feedback">{{ $message }}</div>@enderror
              <small class="text-muted">Tip: one per line. Example: "Whitening - Cosmetic teeth whitening".</small>
            </div>

            <div class="form-group">
              <label>Upload/Replace Storefront Photo (optional)</label>
              <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
              @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
              <small class="text-muted">JPG/PNG up to 4MB.</small>
            </div>

            <button class="btn btn-primary" type="submit">Save Changes</button>
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
            'Location captured: ' + lat.toFixed(6) + ', ' + lng.toFixed(6) +
            '. Now click "Save Changes".';
        },
        function (err) {
          status.textContent = 'Could not get location: ' + err.message;
        },
        { enableHighAccuracy: true, timeout: 15000, maximumAge: 0 }
      );
    });
  })();
</script>
@endpush