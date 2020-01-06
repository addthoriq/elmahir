
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('qlab/images/favicon.png')}}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{asset('qlab/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-12">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{asset('logins/images/bg-06.jpg')}}" width="100%" class="img-fluid">
                                    </div>
                                    <div class="col-6">
                                        <div class="default-tab">
                                            <ul class="nav nav-tabs mb-3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#std"><span><i class="ti-home"></i></span> Siswa</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tch"><span><i class="ti-user"></i></span> Pengajar</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="std" role="tabpanel">
                                                    <div class="p-t-15">
                                                        @include('auth.student')
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tch">
                                                    <div class="p-t-15">
                                                        @include('auth.user')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('qlab/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('qlab/js/custom.min.js')}}"></script>
    <script src="{{asset('qlab/js/settings.js')}}"></script>
    <script src="{{asset('qlab/js/gleek.js')}}"></script>
    <script src="{{asset('qlab/js/styleSwitcher.js')}}"></script>
</body>
</html>
