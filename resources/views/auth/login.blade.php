<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ELearning | Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('qlab/images/favicon.png') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
  <style>
      .logo-main {
        font-family: 'Righteous', cursive;
        color: #006fe6;
        font-size: 40px;
      }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="pl-4 pr-4 pt-4 mt-5 m-3">
            <h4 class="logo-main">E Learning</h4>
            <p class="text-muted">Selamat Datang, masukkan email dan kata sandi untuk masuk ke akun Anda.</p>

            <ul class="nav nav-pills mt-5" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="siswa1" data-toggle="tab" href="#siswa" role="tab" aria-controls="siswa" aria-selected="true">Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="guru1" data-toggle="tab" href="#guru" role="tab" aria-controls="guru" aria-selected="false">Guru</a>
              </li>
            </ul>
            
            <div class="tab-content" id="myTabContent2">
              <div class="tab-pane fade show active" id="siswa" role="tabpanel" aria-labelledby="siswa1">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                      <div class="invalid-feedback">
                        Please fill in your email
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                      <div class="invalid-feedback">
                        please fill in your password
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                      </div>
                    </div>

                    <div class="form-group text-right">
                      <a href="auth-forgot-password.html" class="float-left mt-3">
                        Forgot Password?
                      </a>
                      <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                        Login
                      </button>
                    </div>
                </form>
              </div>
              <div class="tab-pane fade" id="guru" role="tabpanel" aria-labelledby="guru1">
                <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                      <div class="invalid-feedback">
                        Please fill in your email
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                      <div class="invalid-feedback">
                        please fill in your password
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                      </div>
                    </div>

                    <div class="form-group text-right">
                      <a href="auth-forgot-password.html" class="float-left mt-3">
                        Forgot Password?
                      </a>
                      <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                        Login
                      </button>
                    </div>
                </form>
              </div>

            </div>

          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('img/bg-07.jpg') }}" style="min-height: 105vh!important;">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">MI Al Wahdah</h1>
                <h5 class="font-weight-normal text-muted-transparent">Jetis Baran, Sardonoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
