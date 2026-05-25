@extends('layouts.site')

@section('title', 'Clinics | Clinovah')

@section('content')

@push('styles')
<style>
  .cv-page-hero {
    padding: 58px 0 36px;
    background:
      radial-gradient(circle at 12% 10%, rgba(255, 142, 7, 0.12), transparent 26%),
      radial-gradient(circle at 90% 20%, rgba(14, 82, 63, 0.12), transparent 30%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
  }

  .cv-page-kicker {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid var(--cv-border);
    color: var(--cv-green);
    border-radius: 999px;
    padding: 9px 14px;
    font-size: 13px;
    font-weight: 900;
    box-shadow: 0 12px 35px rgba(14, 82, 63, 0.07);
  }

  .cv-page-title {
    margin: 18px 0 10px;
    color: var(--cv-dark);
    font-size: clamp(38px, 5vw, 64px);
    line-height: 1;
    letter-spacing: -2px;
    font-weight: 950;
  }

  .cv-page-title span {
    color: var(--cv-orange);
  }

  .cv-page-text {
    color: #40574f;
    font-size: 17px;
    line-height: 1.7;
    max-width: 650px;
  }

  .cv-search-panel {
    margin-top: -22px;
    position: relative;
    z-index: 5;
  }

  .cv-search-card-big {
    background: rgba(255, 255, 255, 0.96);
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 18px;
    box-shadow: 0 24px 70px rgba(14, 82, 63, 0.12);
  }

  .cv-input-soft,
  .cv-select-soft {
    min-height: 56px;
    border-radius: 18px;
    border: 1px solid #dce9e2;
    padding: 0 18px;
    box-shadow: none !important;
    color: var(--cv-dark);
    font-weight: 700;
  }

  .cv-filter-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border-radius: 999px;
    background: var(--cv-mint);
    color: var(--cv-green);
    padding: 8px 12px;
    font-size: 12px;
    font-weight: 900;
  }

  .cv-status-message {
    color: var(--cv-muted);
    font-size: 14px;
    font-weight: 800;
  }

  .cv-clinic-card {
    height: 100%;
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 16px;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.07);
    transition: transform .2s ease, box-shadow .2s ease;
  }

  .cv-clinic-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 28px 75px rgba(14, 82, 63, 0.12);
  }

  .cv-clinic-photo-wrap {
    position: relative;
    height: 170px;
    border-radius: 24px;
    overflow: hidden;
    background: linear-gradient(135deg, #dcefe6, #fff1dc);
  }

  .cv-clinic-photo-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  .cv-verified-badge {
    position: absolute;
    left: 12px;
    top: 12px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: rgba(255,255,255,0.92);
    color: var(--cv-green);
    border-radius: 999px;
    padding: 7px 10px;
    font-size: 11px;
    font-weight: 950;
    backdrop-filter: blur(10px);
  }

  .cv-open-badge {
    position: absolute;
    right: 12px;
    bottom: 12px;
    background: var(--cv-orange);
    color: #fff;
    border-radius: 999px;
    padding: 7px 10px;
    font-size: 11px;
    font-weight: 950;
  }

  .cv-clinic-card h5 {
    color: var(--cv-dark);
    font-weight: 950;
    letter-spacing: -0.4px;
    margin-bottom: 4px;
  }

  .cv-clinic-card p {
    color: var(--cv-muted);
    line-height: 1.55;
  }

  .cv-card-row {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    color: var(--cv-muted);
    font-size: 13px;
    font-weight: 700;
  }

  .cv-card-row i {
    color: var(--cv-green);
    font-size: 18px;
    line-height: 1.1;
  }

  .cv-empty-state {
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 42px 24px;
    text-align: center;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.07);
  }

  .cv-empty-state .icon {
    width: 72px;
    height: 72px;
    margin: 0 auto 16px;
    border-radius: 24px;
    background: var(--cv-mint);
    display: grid;
    place-items: center;
    font-size: 34px;
  }

  .cv-list-section {
    padding: 42px 0 78px;
  }

  @media (max-width: 575px) {
    .cv-page-hero {
      padding: 44px 0 30px;
    }

    .cv-clinic-photo-wrap {
      height: 150px;
    }
  }
</style>
@endpush

<main>
  <section class="cv-page-hero">
    <div class="container">
      <span class="cv-page-kicker">🔎 Find care nearby</span>
      <h1 class="cv-page-title">Find verified <span>clinics</span></h1>
      <p class="cv-page-text mb-0">
        Search trusted clinics, compare location and availability, then book without the phone-call maze.
      </p>
    </div>
  </section>

  <section class="cv-search-panel">
    <div class="container">
      <div class="cv-search-card-big">
        <div class="row g-3 align-items-center">
          <div class="col-lg-6">
           <input id="q" type="search" name="q" class="form-control cv-input-soft"
       placeholder="Search clinics, services, address..."
       value="{{ request('q') }}">
          </div>

          <div class="col-md-6 col-lg-3">
            <select id="sort" class="form-select cv-select-soft">
              <option value="default" selected>Default Search</option>
              <option value="nearest">Nearest to me</option>
            </select>
          </div>

          <div class="col-md-6 col-lg-3">
            <select id="radius_km" class="form-select cv-select-soft" disabled>
              <option value="5">Within 5 km</option>
              <option value="10">Within 10 km</option>
              <option value="25" selected>Within 25 km</option>
              <option value="50">Within 50 km</option>
              <option value="100">Within 100 km</option>
            </select>
          </div>

          <div class="col-12 d-flex flex-wrap gap-2">
            <span class="cv-filter-pill">✅ Verified Clinics</span>
            <span class="cv-filter-pill">⚡ Book With or Without Account</span>
            <span class="cv-filter-pill">🏥 Pay at Clinic</span>
            <span class="cv-filter-pill">📍 Location Aware</span>
          </div>

          <div class="col-12 d-flex flex-wrap gap-2">
            <button id="btnSearch" type="button" class="cv-btn-green">Search</button>
            <button id="btnClear" type="button" class="cv-btn-light">Clear</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cv-list-section">
    <div class="container">
      <div id="status" class="cv-status-message mb-3"></div>

      <div id="defaultList">
        <div class="row g-4">
          @forelse ($clinics as $clinic)
            @php
              $photoUrl = $clinic->photo_path
                ? asset('storage/' . $clinic->photo_path)
                : asset('assets/clin/images/logo/clinovah.png');
            @endphp

            <div class="col-md-6 col-xl-4">
              <article class="cv-clinic-card">
                <a href="{{ route('clinics.show', $clinic) }}" class="d-block cv-clinic-photo-wrap mb-3">
                  <img src="{{ $photoUrl }}" alt="{{ $clinic->name }}">
                  <span class="cv-verified-badge"><i class="ri-verified-badge-fill"></i> Verified</span>
                  @php
                    $todayName = strtolower(now()->format('l'));

                    $isOpenToday = collect($clinic->availability_days ?? [])
                      ->map(fn ($d) => strtolower($d))
                      ->contains($todayName);
                  @endphp

                  <span class="cv-open-badge">
                    {{ $isOpenToday ? 'Open today' : 'Closed today' }}
                  </span>
                </a>

                <div class="px-1">
                  <a href="{{ route('clinics.show', $clinic) }}">
                    <h5>{{ $clinic->name }}</h5>
                  </a>
                  <p class="mb-3">{{ $clinic->tagline ?: 'Specialized healthcare and appointment booking.' }}</p>

                  <div class="d-grid gap-2 mb-3">
                    <div class="cv-card-row">
                      <i class="ri-time-line"></i>
                      <span>{{ $clinic->working_hours ?: 'Working hours not set' }}</span>
                    </div>
                    <div class="cv-card-row">
                      <i class="ri-map-pin-line"></i>
                      <span>{{ $clinic->address ?: 'Address not set' }}</span>
                    </div>
                  </div>

                  <div class="d-flex gap-2">
                    <a class="cv-btn-light flex-fill" href="{{ route('clinics.show', $clinic) }}">View</a>
                    <a class="cv-btn-orange flex-fill" href="{{ route('clinics.show', $clinic) }}#booking">Book</a>
                  </div>
                </div>
              </article>
            </div>
          @empty
            <div class="col-12">
              <div class="cv-empty-state">
                <div class="icon">🏥</div>
                              @if(request('q'))
                  <h4 class="fw-bold">No clinics found for “{{ request('q') }}”</h4>
                  <p class="text-muted mb-3">Try a different clinic name, service, or location.</p>
                  <a href="{{ route('clinics.index') }}" class="cv-btn-orange">Clear Search</a>
                @else
                  <h4 class="fw-bold">No clinics available yet</h4>
                  <p class="text-muted mb-0">Once approved clinics are added, they will appear here.</p>
                @endif
              </div>
            </div>
          @endforelse
        </div>

        <div class="mt-4">
          {{ $clinics->links() }}
        </div>
      </div>

      <div id="nearList" style="display:none;">
        <div class="row g-4" id="nearResults"></div>
      </div>
    </div>
  </section>
</main>

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
      : `{{ asset('assets/clin/images/logo/clinovah.png') }}`;

    const distance = c.distance_km !== undefined && c.distance_km !== null
      ? (Math.round(Number(c.distance_km) * 10) / 10).toFixed(1)
      : null;

    const detailsUrl = `/clinics/${c.id}`;

    return `
      <div class="col-md-6 col-xl-4">
        <article class="cv-clinic-card">
          <a href="${detailsUrl}" class="d-block cv-clinic-photo-wrap mb-3">
            <img src="${photoUrl}" alt="${escapeHtml(c.name)}">
            <span class="cv-verified-badge"><i class="ri-verified-badge-fill"></i> Verified</span>
           <span class="cv-open-badge">
             ${distance
              ? `${distance} km away`
              : (c.is_open_today ? 'Open today' : 'Closed today')}
          </span>
          </a>

          <div class="px-1">
            <a href="${detailsUrl}"><h5>${escapeHtml(c.name)}</h5></a>
            <p class="mb-3">${escapeHtml(c.tagline || 'Specialized healthcare and appointment booking.')}</p>

            <div class="d-grid gap-2 mb-3">
              <div class="cv-card-row"><i class="ri-time-line"></i><span>${escapeHtml(c.working_hours || 'Working hours not set')}</span></div>
              <div class="cv-card-row"><i class="ri-map-pin-line"></i><span>${escapeHtml(c.address || 'Address not set')}</span></div>
            </div>

            <div class="d-flex gap-2">
              <a class="cv-btn-light flex-fill" href="${detailsUrl}">View</a>
              <a class="cv-btn-orange flex-fill" href="${detailsUrl}#booking">Book</a>
            </div>
          </div>
        </article>
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

    const params = new URLSearchParams({ lat: userLat, lng: userLng, radius_km, q });
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
      const q = qInput.value.trim();
      if (q) {
        window.location.href = `{{ route('clinics.index') }}?q=${encodeURIComponent(q)}`;
      }
    }
  });

  btnClear.addEventListener('click', () => {
  window.location.href = `{{ route('clinics.index') }}`;
});

  qInput.addEventListener('keydown', (e) => {
    if (e.key !== 'Enter') return;
    e.preventDefault();
    btnSearch.click();
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
      if (sortSelect.value === 'nearest') fetchNearClinics();
    }, 350);
  });

  radiusSelect.addEventListener('change', () => {
    if (sortSelect.value === 'nearest') fetchNearClinics();
  });
})();
</script>

@endpush