<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Clinic')</title>
  <meta name="description" content="@yield('meta_description', '')">
  <meta name="keywords" content="@yield('meta_keywords', '')">

  <!-- Favicons -->
  <link href="{{ asset('assets/site/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/site/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/site/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/site/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/site/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/site/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/site/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/site/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/site/css/main.css') }}" rel="stylesheet">

  <!-- ✅ PWA -->
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  <meta name="theme-color" content="#0d6efd">
</head>

<body class="@yield('body_class', '')">
  <header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center">
            <a href="mailto:contact@clinovah.com">contact@clinovah.com</a>
          </i>
          <i class="bi bi-phone d-flex align-items-center ms-4">
            <span>+256 123 456 789</span>
          </i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#!" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#!" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#!" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#!" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>

    <div class="branding d-flex align-items-cente">
      <div class="container position-relative d-flex align-items-center justify-content-between">
 <a href="{{ route('site.home') }}" class="logo d-flex align-items-center" aria-label="Clinovah Home">
  <img
    src="{{ asset('assets/site/img/clinlogo.png') }}"
    alt="Clinovah"
    style="height: 56px; width: auto;"
  >
</a>
  </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('site.home') }}" class="{{ request()->routeIs('site.home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('site.about') }}" class="{{ request()->routeIs('site.about') ? 'active' : '' }}">About</a></li>
           <li>
             <a href="{{ route('clinics.index') }}" class="{{ request()->routeIs('clinics.*') ? 'active' : '' }}"> Clinics  </a> </li>


            <li><a href="{{ route('site.contact') }}" class="{{ request()->routeIs('site.contact') ? 'active' : '' }}">Contact</a></li>

            {{-- Optional: link to clinic portal --}}
            <li><a href="{{ route('clinic.login') }}">Clinic Login</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>
  </header>

 <main class="main" style="padding-top: 120px;">
  @yield('content')
</main>

  <footer id="footer" class="footer-16 footer position-relative">
  <div class="container">
    <div class="footer-main" data-aos="fade-up" data-aos-delay="100">
      <div class="row align-items-start gy-4">

        {{-- Brand --}}
       <div class="col-lg-5">
  <div class="brand-section">
    <a href="{{ route('site.home') }}" class="logo d-flex align-items-center mb-4" aria-label="Clinovah Home">
      <img
        src="{{ asset('assets/site/img/clinlogo.png') }}"
        alt="Clinovah"
        style="height: 34px; width: auto; margin-right: 10px;"
      >
      <span class="sitename">Clinovah</span>
    </a>

            <p class="brand-description">
              Transforming access to dental and specialized care through intuitive platforms that simplify how patients find and connect.
            </p>

            <div class="contact-info mt-4">
              <div class="contact-item">
                <i class="bi bi-geo-alt"></i>
                <span>123 Kampala Road, Kampala, Uganda</span>
              </div>
              <div class="contact-item">
                <i class="bi bi-telephone"></i>
                <span>+256 123 456 789</span>
              </div>
              <div class="contact-item">
                <i class="bi bi-envelope"></i>
                <span>contact@clinovah.com</span>
              </div>
            </div>
          </div>
        </div>

        {{-- Footer links (placeholders only, no routes yet) --}}
       <div class="col-lg-7">
  <div class="footer-nav-wrapper">
    <div class="row gy-4">
      <div class="col-6 col-lg-4">
        <div class="nav-column">
          <h6>Explore</h6>
          <nav class="footer-nav">
            <a href="{{ route('site.home') }}">Home</a>
            <a href="{{ route('site.about') }}">About</a>
            <a href="{{ route('clinics.index') }}">Clinics</a>
          </nav>
        </div>
      </div>

      <div class="col-6 col-lg-4">
        <div class="nav-column">
          <h6>Accounts</h6>
          <nav class="footer-nav">
            <a href="{{ route('login') }}">Patient Login</a>
            <a href="{{ route('clinic.login') }}">Clinic Login</a>

            {{-- If your admin routes file is prefixed (e.g. /admin), this will work.
                 If not, tell me the admin login URL and I’ll adjust. --}}
            <a href="{{ route('admin.login') }}">Admin Login</a>
          </nav>
        </div>
      </div>

      <div class="col-6 col-lg-4">
        <div class="nav-column">
          <h6>Help & Legal</h6>
          <nav class="footer-nav">
            <a href="{{ route('site.faq') }}">FAQs</a>
            <a href="{{ route('site.privacy') }}">Privacy Policy</a>
            <a href="{{ route('site.terms') }}">Terms of Service</a>
          </nav>
        </div>
      </div>

    </div>
  </div>
</div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="bottom-content" data-aos="fade-up" data-aos-delay="300">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="copyright">
              <p>© <span class="sitename">Clinovah</span>. All rights reserved.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="legal-links">
              <a href="#!">Privacy Policy</a>
              <a href="#!">Terms of Service</a>
              <a href="#!">FAQs</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>



  <!-- Scroll Top -->
  <a href="#!" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/site/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/site/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/site/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/site/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/site/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/site/js/main.js') }}"></script>

  <!-- ✅ PWA -->
  <script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('/service-worker.js');
    });
  }
</script>
</body>
</html>