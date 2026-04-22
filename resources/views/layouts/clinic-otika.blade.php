<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Clinic Portal')</title>

  {{-- Otika CSS (served from public/assets/admin/...) --}}
  <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin/img/favicon.ico') }}' />

  @stack('styles')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <div class="navbar-bg"></div>

      {{-- Topbar --}}
      @include('clinic.partials.topbar')

      {{-- Sidebar --}}
      @include('clinic.partials.sidebar')

      {{-- Main content --}}
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>

        {{-- Settings panel (optional) --}}
        @include('clinic.partials.settings')
      </div>

      {{-- Footer --}}
      @include('clinic.partials.footer')

    </div>
  </div>

  {{-- General JS Scripts --}}
  <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>

  {{-- JS Libraries --}}
  <script src="{{ asset('assets/admin/bundles/apexcharts/apexcharts.min.js') }}"></script>

  {{-- Template JS File --}}
  <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>

  {{-- Custom JS File --}}
  <script src="{{ asset('assets/admin/js/custom.js') }}"></script>

  @stack('scripts')
</body>
</html>