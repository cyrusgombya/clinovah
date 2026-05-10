@extends('layouts.site')

@section('title', 'Clinic Register | Clinovah')

@section('content')

<style>
  .cv-auth-wrap{
    min-height:100vh;
    display:flex;
    align-items:center;
    background:
      radial-gradient(circle at top left, rgba(255,142,7,.12), transparent 26%),
      radial-gradient(circle at top right, rgba(14,82,63,.13), transparent 30%),
      linear-gradient(180deg,#ffffff 0%,#f3fbf7 100%);
    padding:40px 0;
  }

  .cv-auth-card{
    background:#fff;
    border:1px solid #dce9e2;
    border-radius:34px;
    overflow:hidden;
    box-shadow:0 30px 80px rgba(14,82,63,.12);
  }

  .cv-auth-left{ padding:48px; }

  .cv-auth-right{
    background:linear-gradient(135deg,#0e523f 0%,#14664f 100%);
    color:#fff;
    padding:48px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    position:relative;
    overflow:hidden;
  }

  .cv-auth-right::before{
    content:'';
    position:absolute;
    width:260px;
    height:260px;
    background:rgba(255,255,255,.06);
    border-radius:50%;
    top:-80px;
    right:-80px;
  }

  .cv-auth-title{
    font-size:46px;
    line-height:1;
    letter-spacing:-2px;
    font-weight:950;
    color:#163229;
    margin-bottom:12px;
  }

  .cv-auth-sub{
    color:#587067;
    line-height:1.7;
    margin-bottom:30px;
  }

  .cv-auth-input{
    width:100%;
    border:1px solid #dce9e2;
    border-radius:18px;
    padding:15px 18px;
    font-weight:700;
    outline:none;
  }

  .cv-auth-label{
    font-weight:900;
    color:#163229;
    margin-bottom:8px;
  }

  .cv-auth-side-title{
    font-size:42px;
    line-height:1;
    font-weight:950;
    margin-bottom:16px;
  }

  .cv-auth-side-text{
    color:rgba(255,255,255,.8);
    line-height:1.8;
  }

  .cv-auth-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:rgba(255,255,255,.12);
    border:1px solid rgba(255,255,255,.1);
    border-radius:999px;
    padding:10px 14px;
    font-size:12px;
    font-weight:900;
    margin-bottom:18px;
  }

  .cv-step-card{
    position:relative;
    z-index:2;
    background:rgba(255,255,255,.1);
    border:1px solid rgba(255,255,255,.12);
    border-radius:22px;
    padding:16px;
    margin-top:14px;
  }

  .cv-step-card strong{
    display:block;
    margin-bottom:4px;
  }

  .cv-step-card small{
    color:rgba(255,255,255,.75);
  }

  @media(max-width:991px){
    .cv-auth-right{ display:none; }
    .cv-auth-left{ padding:28px; }
    .cv-auth-title{ font-size:38px; }
  }
</style>

<div class="cv-auth-wrap">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="cv-auth-card">
          <div class="row g-0">

            <div class="col-lg-6">
              <div class="cv-auth-left">

                <a href="{{ route('site.home') }}" class="d-inline-block mb-4">
                  <img src="{{ asset('assets/clin/images/logo/clinovah.png') }}" style="height:52px;" alt="Clinovah">
                </a>

                <h1 class="cv-auth-title">Register clinic</h1>

                <p class="cv-auth-sub">
                  Create your clinic account. After registration, your clinic can submit details and documents for verification.
                </p>

                <form method="POST" action="{{ route('clinic.register.store') }}">
                  @csrf

                  <div class="mb-3">
                    <label class="cv-auth-label">Clinic Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           class="cv-auth-input"
                           required
                           autofocus
                           placeholder="e.g. Bright Smile Dental Clinic">
                    @error('name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="cv-auth-label">Clinic Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="cv-auth-input"
                           required
                           placeholder="clinic@example.com">
                    @error('email')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="cv-auth-label">Phone Number</label>
                    <input type="text"
                           name="phone"
                           value="{{ old('phone') }}"
                           class="cv-auth-input"
                           placeholder="+256 7XX XXX XXX">
                    @error('phone')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="cv-auth-label">Password</label>
                    <input type="password"
                           name="password"
                           class="cv-auth-input"
                           required
                           placeholder="Create a password">
                    @error('password')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label class="cv-auth-label">Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="cv-auth-input"
                           required
                           placeholder="Confirm password">
                  </div>

                  <button class="cv-btn-orange w-100">
                    Create Clinic Account
                  </button>

                  <div class="mt-4 text-center">
                    <small class="text-muted">
                      Already have a clinic account?
                      <a href="{{ route('clinic.login') }}" class="fw-bold text-decoration-none">
                        Login
                      </a>
                    </small>
                  </div>
                </form>

              </div>
            </div>

            <div class="col-lg-6">
              <div class="cv-auth-right">

                <div class="cv-auth-badge">
                  <i class="ri-hospital-line"></i>
                  Clinic onboarding
                </div>

                <h2 class="cv-auth-side-title">
                  Join Clinovah’s verified care network.
                </h2>

                <p class="cv-auth-side-text">
                  Patients trust clinics that are visible, verified, and easy to book. Clinovah helps your clinic receive appointment requests with less back-and-forth.
                </p>

                <div class="cv-step-card">
                  <strong>1. Register your clinic</strong>
                  <small>Create your clinic access account.</small>
                </div>

                <div class="cv-step-card">
                  <strong>2. Submit clinic details</strong>
                  <small>Add location, services, hours, and documents.</small>
                </div>

                <div class="cv-step-card">
                  <strong>3. Get approved</strong>
                  <small>Once verified, your clinic appears to patients.</small>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection