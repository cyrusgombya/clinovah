

@extends('layouts.site')

@section('title', 'Clinovah | Care. Connect. Convenient.')

@section('content')

@push('styles')
<style>
  .cv-home-page {
    background: var(--cv-bg);
    overflow: hidden;
  }

  .cv-hero {
    position: relative;
    padding: 90px 0 70px;
    background:
      radial-gradient(circle at 12% 14%, rgba(255, 142, 7, 0.12), transparent 28%),
      radial-gradient(circle at 88% 22%, rgba(14, 82, 63, 0.12), transparent 30%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
  }

  .cv-hero::after {
    content: "";
    position: absolute;
    width: 520px;
    height: 520px;
    right: -210px;
    top: 90px;
    border-radius: 50%;
    background: rgba(14, 82, 63, 0.08);
    pointer-events: none;
  }

  .cv-hero-content {
    position: relative;
    z-index: 2;
  }

  .cv-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid var(--cv-border);
    color: var(--cv-green);
    border-radius: 999px;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: 800;
    box-shadow: 0 12px 35px rgba(14, 82, 63, 0.08);
  }

  .cv-hero-title {
    margin: 22px 0 18px;
    max-width: 760px;
    color: var(--cv-dark);
    font-size: clamp(46px, 6.2vw, 86px);
    line-height: 0.96;
    letter-spacing: -3px;
    font-weight: 950;
  }

  .cv-hero-title span {
    color: var(--cv-orange);
  }

  .cv-hero-text {
    max-width: 590px;
    color: #40574f;
    font-size: 18px;
    line-height: 1.7;
    margin-bottom: 24px;
  }

  .cv-search-card {
    max-width: 720px;
    background: rgba(255, 255, 255, 0.94);
    border: 1px solid var(--cv-border);
    border-radius: 28px;
    padding: 14px;
    box-shadow: 0 24px 70px rgba(14, 82, 63, 0.1);
    margin-bottom: 22px;
  }

  .cv-search-card .form-control {
    min-height: 58px;
    border-radius: 18px;
    border: 1px solid #dce9e2;
    padding: 0 18px;
    box-shadow: none;
  }

  .cv-trust-line {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    color: #395248;
    font-size: 14px;
    font-weight: 800;
    margin-top: 18px;
  }

  .cv-phone-wrap {
    position: relative;
    z-index: 2;
  }

  .cv-phone-card {
    max-width: 410px;
    margin-left: auto;
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 34px;
    padding: 16px;
    box-shadow: 0 30px 90px rgba(14, 82, 63, 0.18);
  }

  .cv-phone-screen {
    border-radius: 28px;
    overflow: hidden;
    background: #fbfdfb;
    border: 1px solid #edf3ef;
  }

  .cv-app-head {
    background: #fff;
    padding: 18px;
    border-bottom: 1px solid #edf3ef;
  }

  .cv-service-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
  }

  .cv-service-mini {
    background: #fff;
    border: 1px solid #edf3ef;
    border-radius: 18px;
    padding: 12px 6px;
    text-align: center;
    color: #33554b;
    font-size: 12px;
    font-weight: 800;
  }

  .cv-mini-icon {
    width: 38px;
    height: 38px;
    display: grid;
    place-items: center;
    border-radius: 14px;
    background: var(--cv-mint);
    margin: 0 auto 7px;
    font-size: 18px;
  }

  .cv-clinic-mini {
    background: #fff;
    border: 1px solid #edf3ef;
    border-radius: 20px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .cv-clinic-image {
    width: 62px;
    height: 62px;
    flex: 0 0 62px;
    border-radius: 18px;
    background: linear-gradient(135deg, #dcefe6, #fff1dc);
  }

  .cv-pill {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    background: var(--cv-mint);
    color: var(--cv-green);
    padding: 4px 8px;
    font-size: 11px;
    font-weight: 900;
  }

  .cv-section {
    padding: 76px 0;
  }

  .cv-section-white {
    background: #fff;
  }

  .cv-section-title {
    max-width: 720px;
    margin: 0 auto 38px;
    text-align: center;
  }

  .cv-section-title h2 {
    color: var(--cv-dark);
    font-size: clamp(30px, 4vw, 48px);
    line-height: 1.08;
    letter-spacing: -1.5px;
    font-weight: 950;
  }

  .cv-section-title p {
    color: var(--cv-muted);
    font-size: 16px;
    line-height: 1.7;
  }

  .cv-card {
    height: 100%;
    background: #fff;
    border: 1px solid var(--cv-border);
    border-radius: 28px;
    padding: 26px;
    box-shadow: 0 18px 55px rgba(14, 82, 63, 0.06);
  }

  .cv-card-icon {
    width: 58px;
    height: 58px;
    border-radius: 20px;
    background: var(--cv-mint);
    color: var(--cv-green);
    display: grid;
    place-items: center;
    font-size: 26px;
    margin-bottom: 18px;
  }

  .cv-card.orange .cv-card-icon {
    background: var(--cv-cream);
    color: var(--cv-orange);
  }

  .cv-card h5 {
    color: var(--cv-dark);
    font-weight: 900;
    margin-bottom: 8px;
  }

  .cv-card p {
    color: var(--cv-muted);
    margin-bottom: 0;
    line-height: 1.65;
  }

  .cv-step-number {
    width: 48px;
    height: 48px;
    border-radius: 17px;
    background: var(--cv-orange);
    color: #fff;
    display: grid;
    place-items: center;
    font-weight: 950;
    margin-bottom: 18px;
  }

  .cv-cta-box {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--cv-green), #07352a);
    border-radius: 34px;
    padding: 38px;
    color: #fff;
  }

  .cv-cta-box::after {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    right: -80px;
    top: -80px;
    background: rgba(255, 255, 255, 0.08);
  }

  .cv-cta-box h2 {
    font-weight: 950;
    letter-spacing: -1px;
  }
  
  .cv-hero-doctor-card {
  position: relative;
  max-width: 560px;
  margin-left: auto;
}

.cv-hero-doctor-img {
  width: 100%;
  height: 560px;
  object-fit: cover;
  object-position: center;
  border-radius: 42px;
  box-shadow: 0 34px 90px rgba(14, 82, 63, 0.18);
  border: 10px solid #fff;
}

.cv-floating-card {
  position: absolute;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid var(--cv-border);
  border-radius: 22px;
  padding: 14px 16px;
  box-shadow: 0 18px 45px rgba(14, 82, 63, 0.14);
  backdrop-filter: blur(12px);
}

.cv-floating-card strong {
  display: block;
  color: var(--cv-dark);
  font-size: 14px;
  font-weight: 950;
}

.cv-floating-card span {
  display: block;
  color: var(--cv-muted);
  font-size: 12px;
  font-weight: 800;
  margin-top: 2px;
}

.cv-floating-card-top {
  top: 32px;
  left: -24px;
}

.cv-floating-card-bottom {
  right: -18px;
  bottom: 34px;
}

@media (max-width: 991px) {
  .cv-hero-doctor-card {
    margin: 30px auto 0;
  }

  .cv-hero-doctor-img {
    height: 460px;
    border-radius: 34px;
  }

  .cv-floating-card-top {
    left: 14px;
  }

  .cv-floating-card-bottom {
    right: 14px;
  }
}

@media (max-width: 575px) {
  .cv-hero-doctor-img {
    height: 360px;
    border-width: 6px;
    border-radius: 28px;
  }

  .cv-floating-card {
    padding: 11px 13px;
    border-radius: 18px;
  }

  .cv-floating-card strong {
    font-size: 12px;
  }

  .cv-floating-card span {
    font-size: 11px;
  }
}

  @media (max-width: 991px) {
    .cv-hero {
      padding: 64px 0 54px;
    }

    .cv-phone-card {
      margin: 34px auto 0;
    }
  }

  @media (max-width: 575px) {
    .cv-hero-title {
      font-size: 48px;
      letter-spacing: -2px;
    }

    .cv-search-card {
      border-radius: 24px;
    }

    .cv-section {
      padding: 54px 0;
    }

    .cv-cta-box {
      padding: 28px;
    }
  }
</style>
@endpush

<main class="cv-home-page">
  <section class="cv-hero">
    <div class="container cv-hero-content">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <span class="cv-badge">⚡ Book trusted care in under 2 minutes</span>

          <h1 class="cv-hero-title">
            Healthcare made simple. <span>Appointments made easy.</span>
          </h1>

          <p class="cv-hero-text">
            Find verified clinics near you, choose a time that works, and book your appointment without long calls, queues, or confusion.
          </p>

          <div class="cv-search-card">
            <form action="{{ route('clinics.index') }}" method="GET" class="row g-2 align-items-center">
              <div class="col-lg">
                <input type="text" name="q" class="form-control" placeholder="Find a clinic or service">
              </div>
              <div class="col-lg-auto d-grid">
                <button type="submit" class="cv-btn-orange">Find a Clinic</button>
              </div>
            </form>
          </div>

          <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('clinics.index') }}" class="cv-btn-green">Start Booking</a>
            <a href="#how-it-works" class="cv-btn-light">How it Works</a>
          </div>

          <div class="cv-trust-line">
            <span>✅ Verified clinics</span>
            <span>🔔 Smart reminders</span>
            <span>📍 Nearby options</span>
          </div>
        </div>

        <div class="col-lg-6 cv-phone-wrap">
  <div class="cv-hero-doctor-card">
    <img 
      src="{{ asset('assets/clin/images/hero/doctor.png') }}" 
      alt="Friendly Clinovah doctor" 
      class="cv-hero-doctor-img"
    >

    <div class="cv-floating-card cv-floating-card-top">
      <strong>✅ Verified clinics</strong>
      <span>Trusted care near you</span>
    </div>

    <div class="cv-floating-card cv-floating-card-bottom">
      <strong>📅 Easy booking</strong>
      <span>Choose a time that works</span>
    </div>
  </div>
</div>
      </div>
    </div>
  </section>

  <section class="cv-section" id="services">
    <div class="container">
      <div class="cv-section-title">
        <h2>Book the care you need, faster</h2>
        <p>Clinovah keeps the experience light, clear, and friendly, especially on mobile.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3"><div class="cv-card"><div class="cv-card-icon">🩺</div><h5>General Practice</h5><p>Find nearby clinics for everyday consultation and outpatient care.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="cv-card orange"><div class="cv-card-icon">🦷</div><h5>Dental Care</h5><p>Book extractions, cleaning, fillings, and routine dental visits.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="cv-card"><div class="cv-card-icon">👶</div><h5>Maternal Health</h5><p>Access antenatal care, child health, and family clinic services.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="cv-card orange"><div class="cv-card-icon">🧪</div><h5>Lab & Diagnostics</h5><p>Discover facilities offering tests and diagnostic support.</p></div></div>
      </div>
    </div>
  </section>

  <section class="cv-section cv-section-white" id="how-it-works">
    <div class="container">
      <div class="cv-section-title">
        <h2>Three steps from search to booked</h2>
        <p>No long registration maze. No dead ends. Just a clear path to care.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4"><div class="cv-card"><div class="cv-step-number">1</div><h5>Search nearby clinics</h5><p>Search by clinic name, service, location, or available time.</p></div></div>
        <div class="col-md-4"><div class="cv-card"><div class="cv-step-number">2</div><h5>Pick a time slot</h5><p>Choose available dates and times without calling reception first.</p></div></div>
        <div class="col-md-4"><div class="cv-card"><div class="cv-step-number">3</div><h5>Confirm your booking</h5><p>Get your booking reference and reminders before your visit.</p></div></div>
      </div>
    </div>
  </section>

  <section class="cv-section" id="clinics">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-5">
          <div class="cv-section-title text-lg-start mb-4">
            <h2>Designed around trust</h2>
            <p>Patients need confidence before they book. Clinovah should make verified clinics, clear appointment times, and reminders feel obvious.</p>
          </div>
          <a href="{{ route('clinics.index') }}" class="cv-btn-green">Explore Clinics</a>
        </div>

        <div class="col-lg-7">
          <div class="row g-3">
            <div class="col-sm-6"><div class="cv-card"><h5>✅ Verified Clinics</h5><p>Clinics can be approved before becoming visible to patients.</p></div></div>
            <div class="col-sm-6"><div class="cv-card"><h5>🔔 Smart Reminders</h5><p>Patients receive reminders before appointment time.</p></div></div>
            <div class="col-sm-6"><div class="cv-card"><h5>📍 Nearby Alternatives</h5><p>No availability should guide users toward other options.</p></div></div>
            <div class="col-sm-6"><div class="cv-card"><h5>🛡️ Simple & Private</h5><p>Short forms, clear statuses, and minimal patient details.</p></div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pb-5">
    <div class="container">
      <div class="cv-cta-box">
        <div class="row align-items-center g-4 position-relative">
          <div class="col-lg-8">
            <h2>Ready to book healthcare without the headache?</h2>
            <p class="mb-0 text-white-50">Start with a clinic search and let Clinovah guide the patient from discovery to confirmation.</p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="{{ route('clinics.index') }}" class="cv-btn-orange">Find a Clinic</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection
