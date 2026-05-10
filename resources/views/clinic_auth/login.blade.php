@extends('layouts.site')

@section('title', 'Clinic Login | Clinovah')

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

  .cv-auth-left{
    padding:48px;
  }

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

  .cv-auth-right::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,142,7,.16);
    border-radius:50%;
    bottom:-60px;
    left:-60px;
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

  @media(max-width:991px){
    .cv-auth-right{
      display:none;
    }

    .cv-auth-left{
      padding:28px;
    }

    .cv-auth-title{
      font-size:38px;
    }
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
                  <img src="{{ asset('assets/clin/images/logo/clinovah.png') }}" style="height:52px;">
                </a>

                <h1 class="cv-auth-title">Clinic login</h1>

                <p class="cv-auth-sub">
                  Access your clinic dashboard, manage appointments, review bookings, and stay connected with patients.
                </p>

                <form method="POST" action="{{ route('clinic.login.store') }}">
                  @csrf

                  <div class="mb-3">
                    <label class="cv-auth-label">Email Address</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="cv-auth-input"
                           required>
                    @error('email')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="cv-auth-label">Password</label>
                    <input type="password"
                           name="password"
                           class="cv-auth-input"
                           required>
                    @error('password')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <label class="d-flex align-items-center gap-2">
                      <input type="checkbox" name="remember">
                      <span class="small fw-bold">Remember me</span>
                    </label>
                  </div>

                  <button class="cv-btn-orange w-100">
                    Login to Clinic Portal
                  </button>

                  <div class="mt-4 text-center">
                    <small class="text-muted">
                      No clinic account?
                      <a href="{{ route('clinic.register') }}" class="fw-bold text-decoration-none">
                        Register clinic
                      </a>
                    </small>
                  </div>
                </form>

              </div>
            </div>

            <div class="col-lg-6">
              <div class="cv-auth-right">

                <div class="cv-auth-badge">
                  <i class="ri-shield-check-line"></i>
                  Verified clinic access
                </div>

                <h2 class="cv-auth-side-title">
                  Manage your clinic with confidence.
                </h2>

                <p class="cv-auth-side-text">
                  Confirm appointments, manage specialists, upload documents, and keep patients informed through Clinovah.
                </p>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection