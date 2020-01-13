<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Elearning | Masuk</title>

    <!-- Icons font CSS-->
    <link href="{{asset('regform/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('regform/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{asset('regform/css/main.css')}}" rel="stylesheet" media="all">
</head>
<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title"><a href="{{url('/')}}" style="text-decoration: none; color: #000">Elearning El Zakiy</a></h2>
                    <div class="tab">
                        <a class="tablinks" onclick="openCity(event, 'siswa')" id="defaultOpen"><i class="fa fa-user"></i> Siswa</a>
                        <a class="tablinks" onclick="openCity(event, 'pengajar')"><i class="fa fa-users"></i> Pengajar</a>
                    </div>
                    <div id="siswa" class="tabcontent">
                        <form method="POST">
                            @csrf
                            <div class="input-group">
                                <input required class="input--style-2" type="email" placeholder="Email" name="email">
                            </div>
                            <div class="input-group">
                                <input required class="input--style-2" type="password" placeholder="Kata Sandi" name="password">
                            </div>
                            <div class="p-t-10">
                                <button class="btn btn--radius btn--blue" type="submit">Masuk sebagai Siswa</button>
                            </div>
                        </form>
                    </div>
                    <div id="pengajar" class="tabcontent">
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="input-group">
                                <input required class="input--style-2" type="email" placeholder="Email" name="email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group">
                                <input required class="input--style-2" type="password" placeholder="Kata Sandi" name="password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="p-t-10">
                                <button class="btn btn--radius btn--blue" type="submit">Masuk sebagai Pengajar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('regform/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('regform/js/global.js')}}"></script>
</body>
</html>
