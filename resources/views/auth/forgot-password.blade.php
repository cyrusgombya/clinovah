@extends('layouts.site')

@section('title', 'Forgot Password | Clinovah')

@section('content')

@push('styles')
<style>
  .cv-auth-page {
    min-height: calc(100vh - 90px);
    background:
      radial-gradient(circle at 10% 12%, rgba(255, 142, 7, 0.12), transparent 28%),
      radial-gradient(circle at 88% 16%, rgba(14, 82, 63, 0.12), transparent 32%),
      linear-gradient(180deg, #ffffff 0%, #f3fbf7 100%);
    padding: 70px 0;
  }

  .cv-auth-card {
    background: rgba(255, 255, 255, 0.96);
    border: 1px solid var(--cv-border);
    border-radius: 34px;
    padding: 34px;
    box-shadow: 0 30px 90px rgba(14, 82, 63, 0.13);
  }

  .cv-auth-title {
    color: var(--cv-dark);
    font-weight: 950;
    letter-spacing: -1.4px;
    font-size: clamp(34px, 4vw, 48px);
    line-height: 1.05;
  }

  .cv-auth-text {
    color: var(--cv-muted);
    line-height: 1.75;
  }

  .cv-auth-label {
    color: var(--cv-dark);
    font-weight: 900;
    margin-bottom: 8px;
  }

  .cv-auth-input {
    width: 100%;
    min-height: 56px;
    border: 1px solid #dce9e2;
    border-radius: 18px;
    padding: 0 18px;
    color: var(--cv-dark);
    font-weight: 700;
    outline: none;
    background: #fff;
  }

  .cv-auth-input:focus {
    border-color: var(--cv-green);
    box-shadow: 0 0 0 4px rgba(14, 82, 63, 0.08);
  }

  .cv-error-text {
    color: #dc2626;
    font-size: 13px;
    font-weight: 700;
    margin-top: 6px;
  }

  .cv-session-status {
    border-radius: 18px;
    background: var(--cv-mint);
    color: var(--cv-green);
    padding: 12px 14px;
    font-weight: 800;
    margin-bottom: 16px;
  }

  .cv-auth-link {
    color: var(--cv-green);
    font-weight: 900;
  }

  .cv-auth-link:hover {
    color: var(--cv-orange);
  }
</style>
@endpush

<main class="cv-auth-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-xl-5">
        <div class="cv-auth-card">
          <div class="mb-4">
            <div class="cv-logo-text mb-3">
              Clin<span style="color:var(--cv-orange);">o</span>vah
            </div>

            <h1 class="cv-auth-title">Forgot Password?</h1>

            <p class="cv-auth-text mb-0">
              Enter your email address and we’ll send you a secure link to reset your password.
            </p>
          </div>

          @if (session('status'))
            <div class="cv-session-status">
              {{ session('status') }}
            </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
              <label for="email" class="cv-auth-label">Email Address</label>

              <input id="email"
                     class="cv-auth-input"
                     type="email"
                     name="email"
                     value="{{ old('email') }}"
                     required
                     autofocus
                     autocomplete="username"
                     placeholder="you@example.com">

              @error('email')
                <div class="cv-error-text">{{ $message }}</div>
              @enderror
            </div>

            <button class="cv-btn-green w-100" type="submit">
              Send Password Reset Link
            </button>

            <p class="text-center text-muted fw-bold mt-4 mb-0">
              Remembered your password?
              <a href="{{ route('login') }}" class="cv-auth-link">Log in</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection