<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E Learning 2019</title>
  @include('students.layouts.links.style')
  <style>
    .bg-linear {
      background-image: linear-gradient(-45deg, #0664c9, #0846aa);
    }
    .card {
      border: 1px solid #dedfe0;
    }
    body.layout-3 .main-footer {
      font-size: 14px;
    }
  </style>
  @yield('style')
</head>

<body class="layout-3 bg-white">
  <div id="app">
    <div class="main-wrapper container-fluid">
      {{-- <div class="navbar-bg"></div> --}}

      @include('students.layouts.parts.navbar')

      @include('students.layouts.parts.navmenu')

      <!-- Main Content -->
      <div class="main-content px-5">
        @yield('content')
      </div>
    </div>
      @include('students.layouts.parts.footer')
  </div>

  @include('students.layouts.links.script')
  @yield('libraries')
  @include('students.layouts.links.script-base')
  @yield('specific')
</body>
</html>
