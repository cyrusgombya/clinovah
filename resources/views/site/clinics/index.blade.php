@extends('layouts.site')

@section('title', 'Clinics')

@push('styles')
<style>
  /* Force a vertical card grid (responsive) */
  .doctors-grid{
    display: grid !important;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
  }

  @media (max-width: 991.98px){
    .doctors-grid{ grid-template-columns: repeat(2, minmax(0, 1fr)); }
  }

  @media (max-width: 575.98px){
    .doctors-grid{ grid-template-columns: 1fr; }
  }

  /* Card polish */
  .doctor-profile{
    border-radius: 16px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 10px 30px rgba(16, 24, 40, 0.08);
    transition: transform .18s ease, box-shadow .18s ease;
  }
  .doctor-profile:hover{
    transform: translateY(-3px);
    box-shadow: 0 14px 40px rgba(16, 24, 40, 0.14);
  }

  .profile-header{
    padding: 14px 14px 0 14px;
  }

  .doctor-avatar{
    border-radius: 14px;
    overflow: hidden;
    position: relative;
    margin-bottom: 12px;
  }

  .doctor-avatar img{
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
  }

  /* Make details breathe */
  .doctor-details h4{
    margin-bottom: 8px;
    font-size: 18px;
    line-height: 1.2;
  }

  .specialty-tag{
    display: inline-block;
    margin-bottom: 10px;
  }

  .experience-info{
    margin-top: 6px;
    display: flex;
    gap: 8px;
    align-items: flex-start;
  }

  .experience-info i{
    margin-top: 2px;
  }

  .rating-section{
    padding: 10px 14px 0 14px;
  }

  .action-buttons{
    padding: 14px;
    display: flex;
    gap: 10px;
  }
  .action-buttons a{
    flex: 1;
    text-align: center;
  }

  /* Controls look */
  .controls-card{
    border-radius: 16px;
    background: #fff;
    box-shadow: 0 10px 30px rgba(16, 24, 40, 0.06);
    padding: 14px;
  }

  /* Status text */
  #status{
    font-size: 14px;
  }
</style>
@endpush

@section('content')
<main class="main">
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h4 mb-0">Clinics</h1>
    </div>

    {{-- Controls (still client-side; now Enter works) --}}
    <div class="controls-card mb-3">
      <div class="row g-2 align-items-end">
        <div class="col-md-6">
          <label class="form-label small text-muted mb-1">Search</label>
          <input id="q" class="form-control" placeholder="Search by name, address, services...">
        </div>

        <div class="col-md-3">
          <label class="form-label small text-muted mb-1">Sort</label>
          <select id="sort" class="form-select">
            <option value="default" selected>Default</option>
            <option value="nearest">Nearest to me</option>
          </select>
        </div>

        <div class="col-md-3">
          <label class="form-label small text-muted mb-1">Radius</label>
          <select id="radius_km" class="form-select" disabled>
            <option value="5">Within 5 km</option>
            <option value="10">Within 10 km</option>
            <option value="25" selected>Within 25 km</option>
            <option value="50">Within 50 km</option>
            <option value="100">Within 100 km</option>
          </select>
        </div>

        <div class="col-12 d-flex flex-wrap gap-2 align-items-center justify-content-between">
          <small class="text-muted">
            Tip: choose <strong>Nearest to me</strong> to search instantly (distance + filtering).
          </small>

          <div class="d-flex gap-2">
            <button id="btnSearch" type="button" class="btn btn-primary btn-sm">
              <i class="bi bi-search me-1"></i> Search
            </button>
            <button id="btnClear" type="button" class="btn btn-outline-secondary btn-sm">
              Clear
            </button>
          </div>
        </div>
      </div>
    </div>

    <div id="status" class="text-muted mb-3"></div>

    {{-- Default server-rendered list (keeps pagination working) --}}
    <div id="defaultList">
      <div class="doctors-grid" data-aos="fade-up" data-aos-delay="300">
        @forelse ($clinics as $i => $clinic)
          @php
            $photoUrl = $clinic->photo_path
              ? asset('storage/' . $clinic->photo_path)
              : asset('assets/site/img/health/neurology-2.webp');

            // Placeholder rating until reviews feature exists
            $rating = 4.8;
            $reviews = 0;
          @endphp

          <div class="doctor-profile" data-aos="zoom-in" data-aos-delay="{{ 100 + ($i % 6) * 100 }}">
            <div class="profile-header">
              <div class="doctor-avatar">
                <img src="{{ $photoUrl }}" alt="{{ $clinic->name }}" class="img-fluid">
                <div class="status-indicator available"></div>
              </div>

              <div class="doctor-details">
                <h4>{{ $clinic->name }}</h4>

                <span class="specialty-tag">
                  {{ $clinic->tagline ?: 'Dental & Specialized Care' }}
                </span>

                <div class="experience-info">
                  <i class="bi bi-geo-alt"></i>
                  <span>{{ $clinic->address ?: 'Address not set' }}</span>
                </div>

                <div class="experience-info">
                  <i class="bi bi-clock"></i>
                  <span>{{ $clinic->working_hours ?: 'Working hours not set' }}</span>
                </div>

                <div class="experience-info">
                  <i class="bi bi-cash-coin"></i>
                  <span>Price: {{ $clinic->price_range ?: '—' }}</span>
                </div>
              </div>
            </div>

            <div class="rating-section">
              <div class="stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <span class="rating-score">{{ number_format($rating, 1) }}</span>
              <span class="review-count">({{ $reviews }} reviews)</span>
            </div>

            <div class="action-buttons">
              <a href="{{ route('clinics.show', $clinic) }}" class="btn-secondary">View Details</a>
              <a href="{{ route('clinics.show', $clinic) }}" class="btn-primary">Book Now</a>
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

    {{-- Nearest-to-me list (AJAX) --}}
    <div id="nearList" style="display:none;">
      <div class="doctors-grid" id="nearResults"></div>
    </div>

  </div>
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

  function starsHtml(rating) {
    const full = Math.floor(rating);
    const half = (rating - full) >= 0.5 ? 1 : 0;
    const empty = 5 - full - half;

    let html = '';
    for (let i = 0; i < full; i++) html += '<i class="bi bi-star-fill"></i>';
    if (half) html += '<i class="bi bi-star-half"></i>';
    for (let i = 0; i < empty; i++) html += '<i class="bi bi-star"></i>';
    return html;
  }

  function clinicCard(c) {
    const photoUrl = c.photo_path
      ? `{{ asset('storage') }}/${c.photo_path}`
      : `{{ asset('assets/site/img/health/neurology-2.webp') }}`;

    // Some items might not have distance_km if API changes; guard it
    const distance = (c.distance_km !== undefined && c.distance_km !== null)
      ? (Math.round(Number(c.distance_km) * 10) / 10).toFixed(1)
      : null;

    const detailsUrl = `/clinics/${c.id}`;

    // Placeholder until reviews feature exists
    const rating = 4.8;
    const reviews = 0;

    return `
      <div class="doctor-profile">
        <div class="profile-header">
          <div class="doctor-avatar">
            <img src="${photoUrl}" alt="${escapeHtml(c.name)}" class="img-fluid">
            <div class="status-indicator available"></div>
          </div>

          <div class="doctor-details">
            <h4 style="display:flex; align-items:center; justify-content:space-between; gap:10px; margin-bottom:8px;">
              <span>${escapeHtml(c.name)}</span>
              ${distance ? `<span class="badge bg-success" style="font-size:12px;">${distance} km</span>` : ``}
            </h4>

            <span class="specialty-tag">
              ${escapeHtml(c.tagline || 'Dental & Specialized Care')}
            </span>

            <div class="experience-info">
              <i class="bi bi-geo-alt"></i>
              <span>${escapeHtml(c.address || 'Address not set')}</span>
            </div>

            <div class="experience-info">
              <i class="bi bi-clock"></i>
              <span>${escapeHtml(c.working_hours || 'Working hours not set')}</span>
            </div>

            <div class="experience-info">
              <i class="bi bi-cash-coin"></i>
              <span>Price: ${escapeHtml(c.price_range || '—')}</span>
            </div>
          </div>
        </div>

        <div class="rating-section">
          <div class="stars">
            ${starsHtml(rating)}
          </div>
          <span class="rating-score">${rating.toFixed(1)}</span>
          <span class="review-count">(${reviews} reviews)</span>
        </div>

        <div class="action-buttons">
          <a href="${detailsUrl}" class="btn-secondary">View Details</a>
          <a href="${detailsUrl}" class="btn-primary">Book Now</a>
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
      // Ask for location first
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
        status.textContent = `Location set: ${userLat.toFixed(5)}, ${userLng.toFixed(5)}.`;
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

  // ✅ Search button
  btnSearch.addEventListener('click', () => {
    if (sortSelect.value === 'nearest') {
      fetchNearClinics();
    } else {
      // Default mode is server-rendered, so explain clearly
      status.textContent = qInput.value.trim()
        ? 'Default mode search needs server-side filtering. Switch to "Nearest to me" for instant search.'
        : '';
    }
  });

  // ✅ Clear button
  btnClear.addEventListener('click', () => {
    qInput.value = '';
    status.textContent = '';
    if (sortSelect.value === 'nearest') fetchNearClinics();
  });

  // ✅ Pressing Enter now triggers a search
  qInput.addEventListener('keydown', (e) => {
    if (e.key !== 'Enter') return;
    e.preventDefault();

    if (sortSelect.value === 'nearest') {
      fetchNearClinics();
    } else {
      status.textContent = qInput.value.trim()
        ? 'Default mode search needs server-side filtering. Switch to "Nearest to me" for instant search.'
        : '';
    }
  });

  // Sort switching
  sortSelect.addEventListener('change', () => {
    if (sortSelect.value === 'nearest') {
      enableNearMode();
      requestLocationAndLoad();
    } else {
      disableNearMode();
    }
  });

  // Search behavior:
  // - nearest mode: debounce and call API
  qInput.addEventListener('input', () => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      if (sortSelect.value === 'nearest') {
        fetchNearClinics();
      } else {
        status.textContent = qInput.value.trim()
          ? 'Tip: choose "Nearest to me" to search instantly.'
          : '';
      }
    }, 350);
  });

  radiusSelect.addEventListener('change', () => {
    if (sortSelect.value === 'nearest') fetchNearClinics();
  });
})();
</script>
@endpush
*
