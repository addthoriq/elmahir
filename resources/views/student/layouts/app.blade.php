<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ELearning | @yield('title')</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('qlab/images/favicon.png') }}">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  
  <!-- CSS Libraries -->
  @yield('style')
  <style>
    .bg-linear {
      background-image: linear-gradient(-45deg, #007bff, #0846aa);
    }
  </style>
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container-fluid">
      {{-- <div class="navbar-bg bg-linear"></div> --}}
      @include('student.layouts.parts.header')
      @include('student.layouts.parts.menu')

      <!-- Main Content -->
      <div class="main-content px-5">
        @yield('content')
      </div>
      @include('student.layouts.parts.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  @include('student.layouts.links.script')
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  @yield('script')

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>
</body>
</html>
