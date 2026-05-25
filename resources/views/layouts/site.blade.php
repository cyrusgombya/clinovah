<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="@yield('meta_description', 'Clinovah helps patients find verified clinics and book appointments quickly.')">
  <meta name="keywords" content="@yield('meta_keywords', 'Clinovah, clinics, appointments, healthcare booking, Uganda')">

  <title>@yield('title', 'Clinovah')</title>

  <link rel="icon" href="{{ asset('assets/clin/images/fav-icon.png') }}" type="image/x-icon">

  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

<meta name="theme-color" content="#0e523f">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="apple-mobile-web-app-title" content="Clinovah">

<link rel="apple-touch-icon"
      href="{{ asset('assets/clin/images/logo/clinovah.png') }}">

  <link rel="stylesheet" href="{{ asset('assets/clin/css/vendors/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/clin/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/clin/css/remixicon.css') }}">

  <style>
    :root {
      --cv-green: #0e523f;
      --cv-orange: #ff8e07;
      --cv-dark: #163229;
      --cv-muted: #647067;
      --cv-mint: #e8f5ef;
      --cv-cream: #fff4e6;
      --cv-border: #e5eee8;
      --cv-bg: #fbfdfb;
    }

    * { box-sizing: border-box; }

    html { scroll-behavior: smooth; }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: var(--cv-bg);
      color: var(--cv-dark);
    }

    a { text-decoration: none; }

    .cv-site-header {
      position: sticky;
      top: 0;
      z-index: 1000;
      background: rgba(255, 255, 255, 0.94);
      backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--cv-border);
    }

    .cv-logo img {
      max-height: 48px;
      width: auto;
    }

    .cv-logo-text {
      font-size: 30px;
      line-height: 1;
      font-weight: 950;
      letter-spacing: -1px;
      color: var(--cv-green);
    }

    .cv-logo-text span {
      color: var(--cv-orange);
    }

    .cv-nav-link {
      color: #28483f;
      font-weight: 800;
      font-size: 15px;
      padding: 10px 12px;
    }

    .cv-nav-link:hover,
    .cv-nav-link.active {
      color: var(--cv-orange);
    }

    .cv-btn-orange,
    .cv-btn-green,
    .cv-btn-light {
      min-height: 48px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 999px;
      padding: 0 22px;
      font-weight: 900;
      border: 0;
      white-space: nowrap;
    }

    .cv-btn-orange {
      background: var(--cv-orange);
      color: #fff !important;
      box-shadow: 0 14px 35px rgba(255, 142, 7, 0.24);
    }

    .cv-btn-green {
      background: var(--cv-green);
      color: #fff !important;
      box-shadow: 0 14px 35px rgba(14, 82, 63, 0.18);
    }

    .cv-btn-light {
      background: #fff;
      color: var(--cv-green) !important;
      border: 1px solid #dce9e2;
    }

    .cv-user-pill {
      min-height: 48px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      border-radius: 999px;
      padding: 0 16px;
      background: var(--cv-mint);
      color: var(--cv-green);
      font-weight: 900;
      border: 1px solid #dce9e2;
    }

    .cv-user-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: var(--cv-green);
      color: #fff;
      display: grid;
      place-items: center;
      font-size: 13px;
      font-weight: 900;
    }

    .cv-logout-btn {
      min-height: 48px;
      border-radius: 999px;
      padding: 0 22px;
      font-weight: 900;
      border: 1px solid #ffd9b0;
      background: #fff7ed;
      color: var(--cv-orange);
    }

    .cv-mobile-bottom-nav {
      position: fixed;
      left: 50%;
      bottom: 14px;
      transform: translateX(-50%);
      width: min(94%, 430px);
      z-index: 999;
      background: rgba(255,255,255,0.96);
      backdrop-filter: blur(16px);
      border: 1px solid var(--cv-border);
      box-shadow: 0 16px 45px rgba(14, 82, 63, 0.15);
      border-radius: 26px;
      padding: 10px 12px;
    }

    .cv-mobile-bottom-nav a,
    .cv-mobile-bottom-nav button {
      color: #64748b;
      font-size: 12px;
      font-weight: 800;
      text-align: center;
      background: transparent;
      border: 0;
      padding: 0;
    }

    .cv-mobile-bottom-nav a.active {
      color: var(--cv-green);
    }

    .cv-mobile-plus {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: var(--cv-orange);
      color: #fff !important;
      display: grid;
      place-items: center;
      margin: -24px auto 3px;
      font-size: 24px !important;
      box-shadow: 0 12px 30px rgba(255, 142, 7, 0.35);
    }

    .cv-footer {
      background: #fff;
      border-top: 1px solid var(--cv-border);
      padding: 60px 0 22px;
    }

    .cv-footer h6 {
      color: var(--cv-dark);
      font-weight: 900;
      margin-bottom: 16px;
    }

    .cv-footer p,
    .cv-footer a {
      color: var(--cv-muted);
      font-size: 14px;
      line-height: 1.8;
    }

    .cv-footer a:hover {
      color: var(--cv-orange);
    }

    .cv-footer-bottom {
      border-top: 1px solid var(--cv-border);
      margin-top: 35px;
      padding-top: 20px;
      color: var(--cv-muted);
      font-size: 14px;
    }

          /* Fix stuck invisible overlays after login */
      .modal-backdrop,
      .offcanvas-backdrop,
      .loader,
      .page-loader,
      #loader,
      #preloader,
      .preloader {
        display: none !important;
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
      }

      body.modal-open,
      body.offcanvas-backdrop {
        overflow: auto !important;
        padding-right: 0 !important;
      }

    @media (max-width: 991px) {
      body {
        padding-bottom: 86px;
      }
    }
  </style>

  @stack('styles')
</head>

<body>

<header class="cv-site-header">
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <a class="navbar-brand cv-logo d-flex align-items-center gap-2" href="{{ route('site.home') }}">
        <img src="{{ asset('assets/clin/images/logo/clinovah.png') }}"
             alt="Clinovah Logo"
             onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';">

        <span class="cv-logo-text" style="display:none;">
          Clin<span>o</span>vah
        </span>
      </a>

      <button class="navbar-toggler border-0 shadow-none"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#cvMainNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="cvMainNav">

        <ul class="navbar-nav mx-auto gap-lg-2 mt-3 mt-lg-0">

          <li class="nav-item">
            <a class="cv-nav-link {{ request()->routeIs('site.home') ? 'active' : '' }}"
               href="{{ route('site.home') }}">
              Home
            </a>
          </li>

          <li class="nav-item">
            <a class="cv-nav-link"
               href="{{ route('site.home') }}#services">
              Services
            </a>
          </li>

          <li class="nav-item">
            <a class="cv-nav-link {{ request()->routeIs('clinics.*') ? 'active' : '' }}"
               href="{{ route('clinics.index') }}">
              Clinics
            </a>
          </li>

          <li class="nav-item">
            <a class="cv-nav-link {{ request()->routeIs('appointments.track') ? 'active' : '' }}"
               href="{{ route('appointments.track') }}">
              Track Booking
            </a>
          </li>

          <li class="nav-item">
            <a class="cv-nav-link {{ request()->routeIs('site.contact') ? 'active' : '' }}"
               href="{{ route('site.contact') }}">
              Contact
            </a>
          </li>

        </ul>

        <div class="d-flex flex-column flex-lg-row gap-2 ms-lg-auto mt-3 mt-lg-0">

          @auth

            <a href="{{ route('dashboard') }}" class="cv-btn-light">
              Dashboard
            </a>

            <div class="dropdown">

              <button class="cv-user-pill dropdown-toggle"
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false">

                <span class="cv-user-avatar">
                  {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </span>

                {{ Str::limit(Auth::user()->name ?? 'My Account', 12) }}

              </button>

              <ul class="dropdown-menu dropdown-menu-end border-0 shadow rounded-4 p-2">

                <li>
                  <a class="dropdown-item rounded-3 fw-bold"
                     href="{{ route('dashboard.appointments') }}">
                    My Bookings
                  </a>
                </li>

                <li>
                  <a class="dropdown-item rounded-3 fw-bold"
                     href="{{ route('profile.edit') }}">
                    Profile
                  </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="dropdown-item rounded-3 fw-bold text-danger">
                      Logout
                    </button>
                  </form>
                </li>

              </ul>

            </div>

          @else

            <a href="{{ route('login') }}" class="cv-btn-light">
              Login
            </a>

            <a href="{{ route('register') }}" class="cv-btn-orange">
              Sign Up
            </a>

            <a href="{{ route('clinic.login') }}" class="cv-btn-green">
              Clinic Portal
            </a>

          @endauth

        </div>

      </div>
    </div>
  </nav>
</header>

@yield('content')

<footer class="cv-footer">
  <div class="container">

    <div class="row g-4">

      <div class="col-lg-4">

        <a class="cv-logo d-inline-flex align-items-center gap-2 mb-3"
           href="{{ route('site.home') }}">

          <img src="{{ asset('assets/clin/images/logo/clinovah.png') }}"
               alt="Clinovah Logo"
               onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';">

          <span class="cv-logo-text" style="display:none;">
            Clin<span>o</span>vah
          </span>

        </a>

        <p>
          Clinovah helps patients find verified clinics, book appointments,
          and manage visits with less friction.
        </p>

      </div>

      <div class="col-6 col-lg-2">

        <h6>Explore</h6>

        <div class="d-grid gap-2">
          <a href="{{ route('site.home') }}">Home</a>
          <a href="{{ route('clinics.index') }}">Clinics</a>
          <a href="{{ route('site.about') }}">About</a>
          <a href="{{ route('site.contact') }}">Contact</a>
          <a href="{{ route('appointments.track') }}">Track Booking</a>
        </div>

      </div>

      <div class="col-6 col-lg-2">

        <h6>Account</h6>

        <div class="d-grid gap-2">

          @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('dashboard.appointments') }}">My Bookings</a>
          @else
            <a href="{{ route('login') }}">User Login</a>
            <a href="{{ route('register') }}">User Register</a>
            <a href="{{ route('clinic.login') }}">Clinic Login</a>
            <a href="{{ route('clinic.register') }}">Clinic Register</a>
          @endauth

        </div>

      </div>

      <div class="col-lg-4">

        <h6>Contact</h6>

        <p class="mb-1">
          Galuleeba Commercial Plaza, Wakiso Town, S26 Uganda
        </p>

        <p class="mb-1">
          <a href="tel:+256200948068">+256 200 948068</a>
        </p>

        <p class="mb-0">
          <a href="mailto:Contact@clinovah.com">Contact@clinovah.com</a>
        </p>

      </div>

    </div>

    <div class="cv-footer-bottom d-flex flex-column flex-md-row justify-content-between gap-2">
      <span>© {{ date('Y') }} Clinovah. All rights reserved.</span>
      <span>Care. Connect. Convenient.</span>
    </div>

  </div>
</footer>

<div class="cv-mobile-bottom-nav d-lg-none">

  <div class="d-flex justify-content-around align-items-end">

    <a href="{{ route('site.home') }}"
       class="{{ request()->routeIs('site.home') ? 'active' : '' }}">

      <i class="ri-home-5-line d-block fs-5"></i>
      Home

    </a>

    @auth

      <a href="{{ route('dashboard.appointments') }}"
         class="{{ request()->routeIs('dashboard.appointments') ? 'active' : '' }}">

        <i class="ri-calendar-check-line d-block fs-5"></i>
        Bookings

      </a>

    @else

      <a href="{{ route('appointments.track') }}">

        <i class="ri-search-eye-line d-block fs-5"></i>
        Track

      </a>

    @endauth

    <a href="{{ route('clinics.index') }}">

      <span class="cv-mobile-plus">+</span>

    </a>

    <a href="{{ route('clinics.index') }}"
       class="{{ request()->routeIs('clinics.*') ? 'active' : '' }}">

      <i class="ri-search-line d-block fs-5"></i>
      Search

    </a>

    @auth

      <a href="{{ route('dashboard') }}"
         class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

        <i class="ri-user-3-line d-block fs-5"></i>
        Dashboard

      </a>

    @else

      <a href="{{ route('login') }}">

        <i class="ri-user-3-line d-block fs-5"></i>
        Login

      </a>

    @endauth

  </div>

</div>

<script src="{{ asset('assets/clin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll(
      '.modal-backdrop, .offcanvas-backdrop, .loader, .page-loader, #loader, #preloader, .preloader'
    ).forEach(el => el.remove());

    document.body.classList.remove('modal-open');
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
  });
</script>

<script>
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker
            .register('/service-worker.js')
            .then(function (registration) {
                console.log('Clinovah service worker registered:', registration.scope);
            })
            .catch(function (error) {
                console.log('Service worker registration failed:', error);
            });
    });
}
</script>

@stack('scripts')

</body>
</html>