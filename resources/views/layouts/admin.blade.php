<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <title>@yield('title', 'Admin Dashboard')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon.ico') }}">
</head>

<body class="@yield('body_class')">
  <div class="loader"></div>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      @include('admin.partials.navbar')

      <div class="main-sidebar sidebar-style-2">
        @include('admin.partials.sidebar')
      </div>

      <!-- Main Content -->
      @yield('content')

      @include('admin.partials.footer')

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('assets/admin/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  @stack('page-scripts')
  <!-- Template JS File -->
  <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
</body>
</html>