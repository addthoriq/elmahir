<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E Learning 2019</title>
  @include('admin.layouts.links.style')
  @yield('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      {{-- <div class="navbar-bg"></div> --}}

      @include('admin.layouts.parts.navbar')
      @include('admin.layouts.parts.sidebar')


      <!-- Main Content -->
      <div class="main-content">      
        @yield('content')
      </div>
      @include('admin.layouts.parts.footer')
    </div>
  </div>

@include('admin.layouts.links.script')
@yield('script')
</body>
</html>
