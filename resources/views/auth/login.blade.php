<!DOCTYPE html>
<html lang="en">
<head>
    <title>ELearning | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('logins/images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/css/main.css') }}">

    <link href="{{ asset('qlab/css/style.css') }}" rel="stylesheet">

</head>
<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form validate-form">
                    <span class="login100-form-title p-b-43">
                        ELearning Login
                    </span>


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home8"><span><i class="ti-home"></i> Siswa</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile8"><span><i class="ti-user"></i> Pengajar</span></a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane fade show active" id="home8" role="tabpanel">
                            <div class="p-t-15">
                                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                    <input class="input100" type="text" name="email" value="{{ old('email') }}" required>
                                    <span class="focus-input100"></span>
                                    <span class="label-input100">Email</span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Password is required">
                                    <input class="input100" type="password" name="password" required>
                                    <span class="focus-input100"></span>
                                    <span class="label-input100">Password</span>
                                </div>
                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                        <label class="label-checkbox100" for="ckb1">
                                            Remember me
                                        </label>
                                    </div>
                                    <div>
                                        <a href="#" class="txt1">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn">
                                        Login sebagai Siswa
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile8" role="tabpanel">
                            <form  method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="p-t-15">
                                    <div class="wrap-input100 validate-input {{$errors->has('email')?'is-invalid':''}}" data-validate = "Valid email is required: ex@abc.xyz">
                                        <input class="input100" type="email" name="email" required>
                                        <span class="focus-input100"></span>
                                        <span class="label-input100">Email</span>
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="wrap-input100 validate-input {{$errors->has('password')?'is-invalid':''}}" data-validate="Password is required">
                                        <input class="input100" type="password" name="password" required>
                                        <span class="focus-input100"></span>
                                        <span class="label-input100">Password</span>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                                        <div class="contact100-form-checkbox">
                                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                            <label class="label-checkbox100" for="ckb1">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <a href="#" class="txt1">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="container-login100-form-btn">
                                        <button type="submit" class="login100-form-btn">
                                            Login sebagai Pengajar
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

                <!-- make random image login -->
                @php
                    $indexs = [1 => 1, 2=> 2, 3 => 3, 4=> 4, 5 => 5, 6 => 6];
                    $random = array_rand($indexs, 1);
                    $img    = "logins/images/bg-0".$random.".jpg";
                @endphp

                <div class="login100-more" style="background-image: url('{{ asset($img) }}');"></div>
            </div>
        </div>
    </div>





    <script src="{{ asset('logins/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('logins/js/main.js') }}"></script>

    <script src="{{ asset('qlab/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('qlab/js/custom.min.js') }}"></script>
    <script src="{{ asset('qlab/js/settings.js') }}"></script>
    <script src="{{ asset('qlab/js/gleek.js') }}"></script>
    <script src="{{ asset('qlab/js/styleSwitcher.js') }}"></script>

</body>
</html>
