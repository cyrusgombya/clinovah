@extends('layouts.site')

@section('title', 'Clinics')

@push('styles')
<style>
  #status {
    font-size: 14px;
  }

  .clinic-photo {
    width: 82px;
    height: 82px;
    object-fit: cover;
    border-radius: 14px;
  }

  .doctor-box .content h6 {
    margin-bottom: 4px;
  }

  .doctor-box .content p {
    margin-bottom: 0;
  }

  .clinic-distance {
    font-size: 12px;
    display: inline-block;
    margin-top: 4px;
  }
</style>
@endpush

@section('content')

<div class="breadcrumb-section">
  <div class="img-overlay">
    <div class="custom-container container">
      <div class="row g-0">
        <div class="col-12">
          <div class="page-title">
            <h3>Find Clinics</h3>
          </div>
        </div>
        <div class="col-12">
          <div class="icon-breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ url('/') }}">
                  <svg>
                    <use xlink:href="{{ asset('assets/svg/home1.svg#home') }}"></use>
                  </svg>
                </a>
              </li>
              <li class="breadcrumb-item active">Clinics</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="p-0">
  <div class="custom-container container">
    <div class="search-box-2">
      <div class="row gy-3">

        <div class="col-lg-6">
          <div class="search-box">
            <input id="q" type="search" placeholder="Search clinics, services, address...">
            <i class="ri-search-eye-line"></i>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="search-box">
            <select id="sort" class="form-select border-0 bg-transparent">
              <option value="default" selected>Default Search</option>
              <option value="nearest">Nearest to me</option>
            </select>
            <i class="ri-map-pin-fill"></i>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="search-box">
            <select id="radius_km" class="form-select border-0 bg-transparent" disabled>
              <option value="5">Within 5 km</option>
              <option value="10">Within 10 km</option>
              <option value="25" selected>Within 25 km</option>
              <option value="50">Within 50 km</option>
              <option value="100">Within 100 km</option>
            </select>
          </div>
        </div>

        <div class="col-12">
          <ul class="search-delete">
            <li>
              <p>Specialized Care</p>
            </li>
            <li>
              <p>Book With or Without Account</p>
            </li>
            <li>
              <p>Pay at Clinic</p>
            </li>
            <li>
              <p>Verified Clinics</p>
            </li>
          </ul>
        </div>

        <div class="col-12 d-flex gap-2">
          <button id="btnSearch" type="button" class="btn btn-md sub-btn-2">
            Search
          </button>

          <button id="btnClear" type="button" class="btn btn-md btn-outline-secondary">
            Clear
          </button>
        </div>

      </div>
    </div>
  </div>
</section>

<section>
  <div class="custom-container container">

    <div id="status" class="text-muted mb-3"></div>

    {{-- Default Laravel-rendered clinics --}}
    <div id="defaultList">
      <div class="row g-sm-4 g-3 ratio3_3">

        @forelse ($clinics as $clinic)
          @php
            $photoUrl = $clinic->photo_path
              ? asset('storage/' . $clinic->photo_path)
              : asset('assets/images/doctor/team-1/1.jpg');
          @endphp

          <div class="col-xxl-3 col-lg-4 col-md-6">
            <div class="doctor-box">
              <div class="d-flex">
                <div class="img">
                  <img class="img-fluid clinic-photo" src="{{ $photoUrl }}" alt="{{ $clinic->name }}">
                  <div class="icon">
                    <i class="ri-verified-badge-fill"></i>
                  </div>
                </div>

                <div class="content">
                  <a href="{{ route('clinics.show', $clinic) }}">
                    <h6>{{ $clinic->name }}</h6>
                    <p>{{ $clinic->tagline ?: 'Specialized Healthcare' }}</p>
                  </a>

                  <a class="call-icon" href="{{ route('clinics.show', $clinic) }}">
                    <i class="ri-arrow-right-line"></i>
                  </a>
                </div>
              </div>

              <ul class="doctor-history-box">
                <li>
                  <div class="d-flex">
                    <div class="icon">
                      <i class="ri-calendar-check-line"></i>
                    </div>
                    <div class="content">
                      <span>Working Hours</span>
                      <p>{{ $clinic->working_hours ?: 'Working hours not set' }}</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="d-flex">
                    <div class="icon">
                      <i class="ri-hospital-line"></i>
                    </div>
                    <div class="content">
                      <span>Location</span>
                      <p>{{ $clinic->address ?: 'Address not set' }}</p>
                    </div>
                  </div>
                </li>
              </ul>

              <div class="button-group">
                <a class="btn" href="{{ route('clinics.show', $clinic) }}">
                  <i class="ri-eye-line"></i> View
                </a>

                <a class="btn" href="{{ route('clinics.show', $clinic) }}">
                  <i class="ri-calendar-check-line"></i> Book
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-info">No clinics available yet.</div>
          </div>
        @endforelse

      </div>

      <div class="mt-4">
        {{ $clinics->links() }}
      </div>
    </div>

    {{-- Nearby AJAX results --}}
    <div id="nearList" style="display:none;">
      <div class="row g-sm-4 g-3 ratio3_3" id="nearResults"></div>
    </div>

  </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
  const qInput = document.getElementById('q');
  const sortSelect = document.getElementById('sort');
  const radiusSelect = document.getElementById('radius_km');
  const btnSearch = document.getElementById('btnSearch');
  const btnClear = document.getElementById('btnClear');
  const status = document.getElementById('status');
  const defaultList = document.getElementById('defaultList');
  const nearList = document.getElementById('nearList');
  const nearResults = document.getElementById('nearResults');

  let userLat = null;
  let userLng = null;
  let timer = null;

  function escapeHtml(str) {
    return String(str ?? '').replace(/[&<>"']/g, function (m) {
      return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]);
    });
  }

  function clinicCard(c) {
    const photoUrl = c.photo_path
      ? `{{ asset('storage') }}/${c.photo_path}`
      : `{{ asset('assets/images/doctor/team-1/1.jpg') }}`;

    const distance = c.distance_km !== undefined && c.distance_km !== null
      ? (Math.round(Number(c.distance_km) * 10) / 10).toFixed(1)
      : null;

    const detailsUrl = `/clinics/${c.id}`;

    return `
      <div class="col-xxl-3 col-lg-4 col-md-6">
        <div class="doctor-box">
          <div class="d-flex">
            <div class="img">
              <img class="img-fluid clinic-photo" src="${photoUrl}" alt="${escapeHtml(c.name)}">
              <div class="icon">
                <i class="ri-verified-badge-fill"></i>
              </div>
            </div>

            <div class="content">
              <a href="${detailsUrl}">
                <h6>${escapeHtml(c.name)}</h6>
                <p>${escapeHtml(c.tagline || 'Specialized Healthcare')}</p>
                ${distance ? `<span class="clinic-distance">${distance} km away</span>` : ``}
              </a>

              <a class="call-icon" href="${detailsUrl}">
                <i class="ri-arrow-right-line"></i>
              </a>
            </div>
          </div>

          <ul class="doctor-history-box">
            <li>
              <div class="d-flex">
                <div class="icon">
                  <i class="ri-calendar-check-line"></i>
                </div>
                <div class="content">
                  <span>Working Hours</span>
                  <p>${escapeHtml(c.working_hours || 'Working hours not set')}</p>
                </div>
              </div>
            </li>

            <li>
              <div class="d-flex">
                <div class="icon">
                  <i class="ri-hospital-line"></i>
                </div>
                <div class="content">
                  <span>Location</span>
                  <p>${escapeHtml(c.address || 'Address not set')}</p>
                </div>
              </div>
            </li>
          </ul>

          <div class="button-group">
            <a class="btn" href="${detailsUrl}">
              <i class="ri-eye-line"></i> View
            </a>

            <a class="btn" href="${detailsUrl}">
              <i class="ri-calendar-check-line"></i> Book
            </a>
          </div>
        </div>
      </div>
    `;
  }

  function enableNearMode() {
    defaultList.style.display = 'none';
    nearList.style.display = 'block';
    radiusSelect.disabled = false;
  }

  function disableNearMode() {
    nearList.style.display = 'none';
    defaultList.style.display = 'block';
    radiusSelect.disabled = true;
    status.textContent = '';
  }

  async function fetchNearClinics() {
    if (userLat === null || userLng === null) {
      requestLocationAndLoad();
      return;
    }

    const q = qInput.value.trim();
    const radius_km = radiusSelect.value;

    status.textContent = 'Loading nearby clinics...';
    nearResults.innerHTML = '';

    const params = new URLSearchParams({
      lat: userLat,
      lng: userLng,
      radius_km,
      q
    });

    const res = await fetch(`{{ route('api.clinics.nearby') }}?` + params.toString());

    if (!res.ok) {
      status.textContent = 'Failed to load nearby clinics. Please try again.';
      return;
    }

    const json = await res.json();
    const data = json.data || [];

    if (data.length === 0) {
      status.textContent = 'No clinics found within this radius. Try increasing the radius.';
      nearResults.innerHTML = '';
      return;
    }

    status.textContent = `Found ${data.length} clinic(s) near you.`;
    nearResults.innerHTML = data.map(clinicCard).join('');
  }

  function requestLocationAndLoad() {
    status.textContent = 'Requesting location permission...';

    if (!navigator.geolocation) {
      status.textContent = 'Geolocation is not supported by this browser.';
      return;
    }

    navigator.geolocation.getCurrentPosition(
      (pos) => {
        userLat = pos.coords.latitude;
        userLng = pos.coords.longitude;
        fetchNearClinics();
      },
      (err) => {
        status.textContent = 'Could not get your location: ' + err.message;
        sortSelect.value = 'default';
        disableNearMode();
      },
      { enableHighAccuracy: true, timeout: 15000, maximumAge: 0 }
    );
  }

  btnSearch.addEventListener('click', () => {
    if (sortSelect.value === 'nearest') {
      fetchNearClinics();
    } else {
      status.textContent = qInput.value.trim()
        ? 'Switch to "Nearest to me" for instant search using your location.'
        : '';
    }
  });

  btnClear.addEventListener('click', () => {
    qInput.value = '';
    status.textContent = '';

    if (sortSelect.value === 'nearest') {
      fetchNearClinics();
    }
  });

  qInput.addEventListener('keydown', (e) => {
    if (e.key !== 'Enter') return;
    e.preventDefault();

    if (sortSelect.value === 'nearest') {
      fetchNearClinics();
    }
  });

  sortSelect.addEventListener('change', () => {
    if (sortSelect.value === 'nearest') {
      enableNearMode();
      requestLocationAndLoad();
    } else {
      disableNearMode();
    }
  });

  qInput.addEventListener('input', () => {
    clearTimeout(timer);

    timer = setTimeout(() => {
      if (sortSelect.value === 'nearest') {
        fetchNearClinics();
      }
    }, 350);
  });

  radiusSelect.addEventListener('change', () => {
    if (sortSelect.value === 'nearest') {
      fetchNearClinics();
    }
  });
})();
</script>
@endpush