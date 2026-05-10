@extends('layouts.site')

@section('title', $clinic->name . ' | Clinovah')

@section('content')

@php
  $photoUrl = $clinic->photo_path
    ? asset('storage/' . $clinic->photo_path)
    : asset('assets/clin/images/logo/clinovah.png');

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

@push('styles')
<style>
  .cv-detail-hero {
    padding: 50px 0 34px;
    background:
      radial-gradient(circle at 12% 10%, rgba(255, 142, 7, 0.12), transparent 26%),
      radial-gradient(circle at 88% 10%, rgba(14, 82, 63, 0.13), transparent 30%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
  }

  .cv-back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--cv-green);
    font-weight: 900;
    margin-bottom: 18px;
  }

  .cv-detail-title {
    color: var(--cv-dark);
    font-size: clamp(34px, 4.8vw, 64px);
    line-height: 1;
    letter-spacing: -2px;
    font-weight: 950;
    margin-bottom: 14px;
  }

  .cv-detail-subtitle {
    max-width: 680px;
    color: #40574f;
    font-size: 17px;
    line-height: 1.7;
  }

  .cv-detail-photo-card {
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 34px;
    padding: 14px;
    box-shadow: 0 28px 80px rgba(14, 82, 63, 0.14);
  }

  .cv-detail-photo {
    width: 100%;
    height: 330px;
    object-fit: cover;
    border-radius: 26px;
    background: linear-gradient(135deg, #dcefe6, #fff1dc);
  }

  .cv-detail-section {
    padding: 50px 0 78px;
  }

  .cv-side-card,
  .cv-info-card,
  .cv-booking-card {
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 24px;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.07);
  }

  .cv-sticky-card {
    position: sticky;
    top: 92px;
  }

  .cv-detail-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border-radius: 999px;
    background: var(--cv-mint);
    color: var(--cv-green);
    padding: 8px 12px;
    font-size: 12px;
    font-weight: 950;
  }

  .cv-contact-row {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    padding: 14px 0;
    border-bottom: 1px solid var(--cv-border);
  }

  .cv-contact-row:last-child {
    border-bottom: 0;
  }

  .cv-contact-icon {
    width: 42px;
    height: 42px;
    border-radius: 15px;
    background: var(--cv-mint);
    color: var(--cv-green);
    display: grid;
    place-items: center;
    font-size: 20px;
    flex: 0 0 42px;
  }

  .cv-contact-row span {
    display: block;
    color: var(--cv-muted);
    font-size: 12px;
    font-weight: 800;
    margin-bottom: 2px;
  }

  .cv-contact-row p {
    margin: 0;
    color: var(--cv-dark);
    font-weight: 800;
    line-height: 1.5;
  }

  .cv-info-card h3,
  .cv-info-card h4,
  .cv-booking-card h3 {
    color: var(--cv-dark);
    font-weight: 950;
    letter-spacing: -0.8px;
  }

  .cv-info-card p {
    color: var(--cv-muted);
    line-height: 1.75;
  }

  .cv-service-item {
    border: 1px solid var(--cv-border);
    border-radius: 22px;
    padding: 16px;
    background: #fbfdfb;
  }

  .cv-service-dot {
    width: 42px;
    height: 42px;
    border-radius: 15px;
    background: var(--cv-cream);
    color: var(--cv-orange);
    display: grid;
    place-items: center;
    font-size: 20px;
    flex: 0 0 42px;
  }

  .cv-map-wrap {
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid var(--cv-border);
  }

  .cv-form-control,
  .cv-booking-card input,
  .cv-booking-card select,
  .cv-booking-card textarea {
    width: 100%;
    border: 1px solid #dce9e2;
    border-radius: 18px;
    padding: 14px 16px;
    box-shadow: none;
    outline: none;
    color: var(--cv-dark);
    font-weight: 700;
    background: #fff;
  }

  .cv-booking-card label {
    color: var(--cv-dark);
    font-weight: 900;
    margin-bottom: 8px;
  }

  .cv-highlight-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
  }

  .cv-highlight-box {
    background: #fbfdfb;
    border: 1px solid var(--cv-border);
    border-radius: 22px;
    padding: 16px;
  }

  .cv-highlight-box strong {
    color: var(--cv-green);
    display: block;
    font-size: 22px;
    font-weight: 950;
  }

  .cv-highlight-box span {
    color: var(--cv-muted);
    font-size: 12px;
    font-weight: 800;
  }

  /* SLOT PICKER */

  .cv-slot-picker {
    width: 100%;
    max-width: 100%;
    overflow: hidden;
    background: linear-gradient(180deg, #ffffff 0%, #fbfdfb 100%);
    border: 1px solid var(--cv-border);
    border-radius: 30px;
    padding: 18px;
  }

  .cv-slot-dates {
    width: 100%;
    max-width: 100%;
    display: grid;
    grid-template-columns: repeat(7, minmax(0, 1fr));
    gap: 10px;
  }

  .cv-slot-date {
    width: 100%;
    min-width: 0;
    border: 1px solid #dce9e2;
    background: #fff;
    border-radius: 20px;
    padding: 12px 6px;
    cursor: pointer;
    text-align: center;
    box-shadow: 0 10px 24px rgba(14, 82, 63, 0.06);
    transition: all .2s ease;
  }

  .cv-slot-date:hover {
    transform: translateY(-2px);
  }

  .cv-slot-date small {
    display: block;
    font-size: 10px;
    color: var(--cv-muted);
    font-weight: 900;
    text-transform: uppercase;
    margin-bottom: 4px;
  }

  .cv-slot-date span {
    display: block;
    color: var(--cv-dark);
    font-size: 14px;
    font-weight: 950;
    white-space: nowrap;
  }

  .cv-slot-date.active {
    background: var(--cv-green);
    border-color: var(--cv-green);
  }

  .cv-slot-date.active small,
  .cv-slot-date.active span {
    color: #fff;
  }

  .cv-slot-times {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 10px;
  }

  .cv-slot-time {
    width: 100%;
    min-width: 0;
    border: 1px solid #dce9e2;
    background: #fff;
    border-radius: 20px;
    padding: 14px 8px;
    cursor: pointer;
    text-align: center;
    color: var(--cv-dark);
    font-size: 15px;
    font-weight: 950;
    box-shadow: 0 10px 24px rgba(14, 82, 63, 0.06);
    transition: all .2s ease;
  }

  .cv-slot-time:hover {
    transform: translateY(-2px);
  }

  .cv-slot-time small {
    display: block;
    color: var(--cv-muted);
    font-size: 10px;
    font-weight: 800;
    margin-top: 4px;
  }

  .cv-slot-time.active {
    background: var(--cv-orange);
    border-color: var(--cv-orange);
    color: #fff;
  }

  .cv-slot-time.active small {
    color: rgba(255,255,255,.85);
  }

  .cv-selected-slot {
    background: var(--cv-mint);
    color: var(--cv-green);
    border: 1px solid #cfe0d6;
    border-radius: 22px;
    padding: 14px;
    font-weight: 900;
    margin-top: 18px;
  }

  .cv-slot-date em {
  display: block;
  font-style: normal;
  font-size: 10px;
  color: var(--cv-orange);
  font-weight: 900;
  margin-top: 4px;
}

.cv-slot-date.active em {
  color: rgba(255,255,255,.85);
}

.cv-slot-date.is-full {
  opacity: .65;
}

.cv-slot-time.is-disabled {
  opacity: .5;
  cursor: not-allowed;
  background: #f8fafc;
  color: #94a3b8;
}

.cv-slot-time.is-disabled:hover {
  transform: none;
}

.cv-alternatives-box {
  display: none;
  background: #fff7ed;
  border: 1px solid #ffd9b0;
  border-radius: 24px;
  padding: 18px;
  margin-top: 18px;
}

.cv-alt-card {
  display: block;
  background: #fff;
  border: 1px solid #ffe5c7;
  border-radius: 20px;
  padding: 14px;
  color: var(--cv-dark);
}

.cv-alt-card:hover {
  color: var(--cv-green);
}

  /* TABLET */

  @media (max-width: 991px) {
    .cv-detail-photo {
      height: 260px;
    }

    .cv-sticky-card {
      position: static;
    }

    .cv-highlight-grid {
      grid-template-columns: 1fr;
    }

    .cv-slot-dates {
      grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .cv-slot-times {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }
  }

  /* MOBILE */

  @media (max-width: 575px) {
    .cv-slot-picker {
      padding: 14px;
      border-radius: 24px;
    }

    .cv-slot-dates {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .cv-slot-times {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .cv-slot-date,
    .cv-slot-time {
      border-radius: 18px;
    }

    .cv-detail-title {
      font-size: 38px;
    }

    .cv-side-card,
    .cv-info-card,
    .cv-booking-card {
      padding: 18px;
      border-radius: 24px;
    }
  }
</style>
@endpush

<main>
  <section class="cv-detail-hero">
    <div class="container">
      <a href="{{ route('clinics.index') }}" class="cv-back-link"><i class="ri-arrow-left-line"></i> Back to clinics</a>

      <div class="row align-items-center g-4">
        <div class="col-lg-7">
          <div class="d-flex flex-wrap gap-2 mb-3">
            <span class="cv-detail-pill"><i class="ri-verified-badge-fill"></i> Verified clinic</span>
            <span class="cv-detail-pill"><i class="ri-calendar-check-line"></i> Booking available</span>
          </div>

          <h1 class="cv-detail-title">{{ $clinic->name }}</h1>
          <p class="cv-detail-subtitle mb-0">
            {{ $clinic->tagline ?: 'Specialized healthcare services with convenient appointment booking through Clinovah.' }}
          </p>
        </div>

        <div class="col-lg-5">
          <div class="cv-detail-photo-card">
            <img class="cv-detail-photo" src="{{ $photoUrl }}" alt="{{ $clinic->name }}">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cv-detail-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <aside class="cv-side-card cv-sticky-card">
            <h4 class="fw-bold mb-3">Clinic information</h4>

            <div class="cv-contact-row">
              <div class="cv-contact-icon"><i class="ri-phone-line"></i></div>
              <div><span>Phone</span><p>{{ $clinic->phone ?: 'Not provided yet' }}</p></div>
            </div>

            <div class="cv-contact-row">
              <div class="cv-contact-icon"><i class="ri-mail-line"></i></div>
              <div><span>Email</span><p>{{ $clinic->email ?: 'Not provided yet' }}</p></div>
            </div>

            <div class="cv-contact-row">
              <div class="cv-contact-icon"><i class="ri-map-pin-line"></i></div>
              <div><span>Address</span><p>{{ $clinic->address ?: 'Address not set' }}</p></div>
            </div>

            <div class="cv-contact-row">
              <div class="cv-contact-icon"><i class="ri-time-line"></i></div>
              <div><span>Working Hours</span><p>{{ $clinic->working_hours ?: 'Working hours not set' }}</p></div>
            </div>

            <a href="#booking" class="cv-btn-orange w-100 mt-3">Book Appointment</a>
            <a href="{{ $directionsUrl }}" target="_blank" rel="noopener" class="cv-btn-light w-100 mt-2">Get Directions</a>
          </aside>
        </div>

        <div class="col-lg-8">
          <div class="d-grid gap-4">
            <section class="cv-info-card">
              <h3>About {{ $clinic->name }}</h3>
              <p>
                {{ $clinic->about
                  ?? ($clinic->address
                    ? "Located at {$clinic->address}, {$clinic->name} offers specialized healthcare services with a focus on convenience, accessibility, and patient care."
                    : "{$clinic->name} offers specialized healthcare services and makes it easy for patients to request appointments online.") }}
              </p>
              <p class="mb-0">You can review clinic information, check available services, and request an appointment directly from this page. Payments are handled directly at the clinic.</p>
            </section>

            <section class="cv-info-card">
              <h4>Quick highlights</h4>
              <div class="cv-highlight-grid mt-3">
                <div class="cv-highlight-box"><strong>{{ $clinic->price_range ?: '—' }}</strong><span>Price range</span></div>
                <div class="cv-highlight-box"><strong>{{ $clinic->dentists?->count() ?: '—' }}</strong><span>Available specialists</span></div>
                <div class="cv-highlight-box"><strong>Yes</strong><span>Guest booking</span></div>
              </div>
            </section>

            <section class="cv-info-card">
              <h4>Services</h4>

              @if ($servicesParsed->count())
                <p>Explore some of the services offered at this clinic.</p>
                <div class="d-grid gap-3">
                  @foreach ($servicesParsed as $service)
                    <div class="cv-service-item d-flex gap-3">
                      <div class="cv-service-dot"><i class="ri-heart-pulse-line"></i></div>
                      <div>
                        <h6 class="fw-bold mb-1">{{ $service['title'] }}</h6>
                        @if (!empty($service['text']))
                          <p class="mb-0">{{ $service['text'] }}</p>
                        @else
                          <p class="mb-0">Available at this clinic.</p>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              @else
                <p class="mb-0">Services list will be updated soon. You can still request an appointment and specify what you need.</p>
              @endif
            </section>

            <section class="cv-info-card">
              <h4>Location & directions</h4>
              <p>{{ $clinic->address ?: 'Address not provided yet.' }}</p>

              <div class="cv-map-wrap mb-3">
                <iframe
                  src="{{ $googleEmbedSrc }}"
                  width="100%"
                  height="320"
                  style="border:0;"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>

              <a class="cv-btn-green" href="{{ $directionsUrl }}" target="_blank" rel="noopener">Open Google Maps Directions</a>
            </section>

            <section class="cv-booking-card" id="booking">
              <h3>Book an appointment</h3>
              <p class="text-muted mb-4">Keep it short. Submit your details and the clinic can follow up on your request.</p>

              <form method="POST" action="{{ route('appointments.store', $clinic) }}">
  @csrf

  <div class="row gy-3">
    @guest
      <div class="col-12">
        <div class="p-3 rounded-4" style="background:#fff7ed;border:1px solid #ffd9b0;color:#9a4b00;">
          <strong>Booking as a guest</strong><br>
          <small>You can book without an account. Later, we can let guests track bookings using their reference number.</small>
        </div>
      </div>

      <div class="col-md-6">
        <label>Patient Name</label>
        <input type="text" name="patient_name" value="{{ old('patient_name') }}" placeholder="Your name" required>
        @error('patient_name')<small class="text-danger">{{ $message }}</small>@enderror
      </div>

      <div class="col-md-6">
        <label>Email Address</label>
        <input type="email" name="patient_email" value="{{ old('patient_email') }}" placeholder="Your email" required>
        @error('patient_email')<small class="text-danger">{{ $message }}</small>@enderror
      </div>

      <div class="col-md-6">
        <label>Phone Number</label>
        <input type="text" name="patient_phone" value="{{ old('patient_phone') }}" placeholder="Your phone number" required>
        @error('patient_phone')<small class="text-danger">{{ $message }}</small>@enderror
      </div>
    @else
      <div class="col-12">
        <div class="p-3 rounded-4" style="background:#e8f5ef;border:1px solid #cfe0d6;color:#0e523f;">
          <strong>Booking as {{ auth()->user()->name }}</strong><br>
          <small>Your appointment will appear in your dashboard.</small>
        </div>
      </div>
    @endguest

    <div class="col-12">
  <label>Choose Date & Time</label>

  <input type="hidden" id="appointment_at" name="appointment_at" value="{{ old('appointment_at') }}" required>

  <div class="cv-slot-picker">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h5 class="fw-bold mb-1">Pick a day</h5>
        <small class="text-muted fw-bold">Showing the next 14 days</small>
      </div>
      <span class="cv-detail-pill">
        <i class="ri-time-line"></i> 2-hour slots
      </span>
    </div>

    <div class="cv-slot-dates" id="slotDates"></div>

    <div class="mt-4">
      <h5 class="fw-bold mb-1">Pick a time</h5>
      <small class="text-muted fw-bold">Available between 8:00 AM and 5:00 PM</small>

      <div class="cv-slot-times mt-3" id="slotTimes"></div>
    </div>

    <div id="selectedSlotText" class="cv-selected-slot mt-4">
      Select a day and time to continue.
    </div>
    <div id="alternativeClinicsBox" class="cv-alternatives-box">
  <h5 class="fw-bold mb-2">No slots available?</h5>
  <p class="text-muted mb-3">Here are other clinics you can try instead.</p>

  <div class="d-grid gap-2">
    @foreach ($alternativeClinics as $alt)
      <a href="{{ route('clinics.show', $alt) }}#booking" class="cv-alt-card">
        <strong>{{ $alt->name }}</strong><br>
        <small class="text-muted">{{ $alt->address ?: 'Location not set' }}</small>
      </a>
    @endforeach
  </div>
</div>
  </div>

  @error('appointment_at')<small class="text-danger">{{ $message }}</small>@enderror
</div>

    <div class="col-md-6">
      <label>Preferred Specialist</label>
      <select name="dentist_id">
        <option value="">Any available specialist</option>
        @foreach ($clinic->dentists as $dentist)
          <option value="{{ $dentist->id }}" {{ old('dentist_id') == $dentist->id ? 'selected' : '' }}>
            {{ $dentist->full_name }}
          </option>
        @endforeach
      </select>
      @error('dentist_id')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-md-6">
      <label>Service</label>
      <input type="text" name="service" value="{{ old('service') }}" placeholder="e.g. Consultation, scan, therapy...">
      @error('service')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-12">
      <label>Notes</label>
      <textarea name="notes" rows="4" placeholder="Tell the clinic what you need...">{{ old('notes') }}</textarea>
      @error('notes')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-12">
      <button class="cv-btn-orange" type="submit">Submit Booking</button>
    </div>
  </div>
</form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const slotDates = document.getElementById('slotDates');
  const slotTimes = document.getElementById('slotTimes');
  const appointmentInput = document.getElementById('appointment_at');
  const selectedSlotText = document.getElementById('selectedSlotText');
  const alternativeClinicsBox = document.getElementById('alternativeClinicsBox');

  if (!slotDates || !slotTimes || !appointmentInput || !selectedSlotText) return;

  const availabilityUrl = "{{ route('clinics.available_slots', $clinic) }}";

  let slots = [];
  let selectedDate = null;

  function groupSlotsByDate(items) {
    return items.reduce((groups, slot) => {
      if (!groups[slot.date]) groups[slot.date] = [];
      groups[slot.date].push(slot);
      return groups;
    }, {});
  }

  function readableDate(dateValue) {
    const date = new Date(dateValue + 'T00:00:00');

    return date.toLocaleDateString('en-US', {
      weekday: 'long',
      month: 'long',
      day: 'numeric',
      year: 'numeric'
    });
  }

  function shortDate(dateValue) {
    const date = new Date(dateValue + 'T00:00:00');

    return {
      day: date.toLocaleDateString('en-US', { weekday: 'short' }),
      date: date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })
    };
  }

  function renderDates() {
    const grouped = groupSlotsByDate(slots);
    const dates = Object.keys(grouped);

    slotDates.innerHTML = '';

    dates.forEach((dateValue, index) => {
      const dateInfo = shortDate(dateValue);
      const daySlots = grouped[dateValue];
      const availableCount = daySlots.filter(slot => slot.status === 'available').length;

      const button = document.createElement('button');
      button.type = 'button';
      button.className = 'cv-slot-date';
      button.dataset.date = dateValue;

      if (availableCount === 0) {
        button.classList.add('is-full');
      }

      button.innerHTML = `
        <small>${dateInfo.day}</small>
        <span>${dateInfo.date}</span>
        <em>${availableCount} slot${availableCount === 1 ? '' : 's'}</em>
      `;

      button.addEventListener('click', function () {
        document.querySelectorAll('.cv-slot-date').forEach(btn => {
          btn.classList.remove('active');
        });

        button.classList.add('active');
        selectedDate = dateValue;
        appointmentInput.value = '';

        if (availableCount === 0) {
          selectedSlotText.textContent = 'No available slots on this day. Please choose another date.';
        } else {
          selectedSlotText.textContent = 'Now choose a time slot.';
        }

        renderTimes();
      });

      slotDates.appendChild(button);

      if (index === 0) {
        button.click();
      }
    });
  }

  function renderTimes() {
    slotTimes.innerHTML = '';

    if (!selectedDate) return;

    const daySlots = slots.filter(slot => slot.date === selectedDate);

    daySlots.forEach(slot => {
      const button = document.createElement('button');

      button.type = 'button';
      button.className = 'cv-slot-time';
      button.dataset.datetime = slot.datetime;

      if (slot.status !== 'available') {
        button.disabled = true;
        button.classList.add('is-disabled');
      }

      const statusText = slot.status === 'available'
        ? '2 hour visit'
        : slot.status === 'booked'
          ? 'Booked'
          : 'Past';

      button.innerHTML = `
        ${slot.label}
        <small>${statusText}</small>
      `;

      button.addEventListener('click', function () {
        if (slot.status !== 'available') return;

        document.querySelectorAll('.cv-slot-time').forEach(btn => {
          btn.classList.remove('active');
        });

        button.classList.add('active');
        appointmentInput.value = slot.datetime;
        selectedSlotText.textContent = `Selected: ${readableDate(slot.date)} at ${slot.label}`;
      });

      slotTimes.appendChild(button);
    });
  }

  async function loadAvailability() {
    selectedSlotText.textContent = 'Loading available slots...';

    try {
      const response = await fetch(availabilityUrl);

      if (!response.ok) {
        selectedSlotText.textContent = 'Could not load slots. Please refresh and try again.';
        return;
      }

      const json = await response.json();
      slots = json.data || [];
      const availableSlots = slots.filter(slot => slot.status === 'available');

if (alternativeClinicsBox) {
  alternativeClinicsBox.style.display = availableSlots.length === 0 ? 'block' : 'none';
}

      if (slots.length === 0) {
        selectedSlotText.textContent = 'No slots available at this clinic right now.';
        return;
      }

      renderDates();

    } catch (error) {
      selectedSlotText.textContent = 'Network issue while loading slots. Please try again.';
    }
  }

  loadAvailability();
});
</script>
@endpush

@endsection
