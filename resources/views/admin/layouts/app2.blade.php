<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E Learning | @yield('title')</title>
  @include('admin.layouts2.links.style')
  @yield('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      {{-- <div class="navbar-bg"></div> --}}

      @include('admin.layouts2.parts.navbar')
      @include('admin.layouts2.parts.sidebar')


      <!-- Main Content -->
      <div class="main-content">      
        @yield('content')
      </div>
      @include('admin.layouts2.parts.footer')
    </div>
  </div>

@include('admin.layouts2.links.script')
@yield('script')
</body>
</html>
