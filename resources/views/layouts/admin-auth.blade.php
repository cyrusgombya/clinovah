<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <title>@yield('title', 'Admin Login')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/bundles/bootstrap-social/bootstrap-social.css') }}">

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
    @yield('content')
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
</body>
</html>