<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <title>@yield('title', 'Clinic Portal')</title>

  {{-- OTIKA CSS --}}
  <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">

  <link rel="shortcut icon"
        type="image/x-icon"
        href="{{ asset('assets/admin/img/favicon.ico') }}" />

  <style>
    /* Kill stuck loader overlays */
    .loader,
    .page-loader,
    #loader,
    #preloader,
    .preloader,
    .modal-backdrop {
      display: none !important;
      opacity: 0 !important;
      visibility: hidden !important;
      pointer-events: none !important;
    }

    body.loaded {
      overflow: auto !important;
    }
  </style>

  @stack('styles')
</head>

<body class="loaded">

<div id="app">

  <div class="main-wrapper main-wrapper-1">

    <div class="navbar-bg"></div>

    {{-- TOPBAR --}}
    @include('clinic.partials.topbar')

    {{-- SIDEBAR --}}
    @include('clinic.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <div class="main-content">

      <section class="section">
        @yield('content')
      </section>

      {{-- SETTINGS --}}
      @include('clinic.partials.settings')

    </div>

    {{-- FOOTER --}}
    @include('clinic.partials.footer')

  </div>

</div>

{{-- GENERAL JS --}}
<script src="{{ asset('assets/admin/js/app.min.js') }}"></script>

{{-- LIBRARIES --}}
<script src="{{ asset('assets/admin/bundles/apexcharts/apexcharts.min.js') }}"></script>

{{-- TEMPLATE JS --}}
<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>

{{-- CUSTOM JS --}}
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>

<script>
  // emergency cleanup for stuck overlays
  document.addEventListener('DOMContentLoaded', function () {

    document.body.classList.add('loaded');

    document.querySelectorAll(
      '.loader, .page-loader, #loader, #preloader, .preloader, .modal-backdrop'
    ).forEach(el => {
      el.remove();
    });

  });
</script>

@stack('scripts')

</body>
</html>