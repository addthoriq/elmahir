@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Siswa</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('student.index') }}">Data Siswa</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tambah Siswa</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Tambah Data Siswa</h5>
                    </div>
                    <div class="ibox-content">
                        <h2>
                            Data Siswa
                        </h2>
                        <p>
                            Data Siswa ini berfungsi sebagai pengurus dan pengelola e-learning ini
                        </p>

                        <form id="form" action="{{route('student.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf

                            <h1>Akun</h1>
                            <fieldset>
                                <h2>Informasi Akun</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NISN *</label>
                                            <input id="nisn" name="nisn" type="number" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama *</label>
                                            <input id="name" name="name" type="text" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input id="email" name="email" type="text" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password1">Password *</label>
                                            <input id="password1" type="password" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password *</label>
                                            <input id="password" name="password" type="password" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h1>Profil</h1>
                            <fieldset>
                                <h2>Informasi Profil</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tahun Masuk *</label>
                                            <input id="start_year" name="start_year" type="number" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas *</label>
                                            <select class="form-control m-b" name="class_id">
                                                <option>-- Pilih Kelas --</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Ajaran *</label>
                                            <select class="form-control m-b" name="school_year_id">
                                                <option>-- Pilih Tahun Ajaran --</option>
                                                @foreach ($years as $year)
                                                    <option value="{{$year->id}}">{{$year->start_year}}/{{$year->end_year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="i-checks col-sm-6">
                                                <label>
                                                    <input type="radio" value="L" name="gender">
                                                    <i></i>
                                                    Laki-Laki
                                                </label>
                                            </div>
                                            <div class="i-checks col-sm-6">
                                                <label>
                                                    <input type="radio" value="P" name="gender">
                                                    <i></i>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                            <h1>Avatar</h1>
                            <fieldset>
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                  <ul></ul>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="custom-file">
                                            <input id="logo" type="file" name="avatar" class="custom-file-input ava">
                                            <label for="logo" class="custom-file-label">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>

                            <h1>Selesai</h1>
                            <fieldset>
                                <h2>Syarat dan Ketentuan Berlaku</h2>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class=""> <label for="acceptTerms">Saya menyetujui untuk membuat Siswa baru</label>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Steps -->
    <script src="{{asset('inspinia/js/plugins/steps/jquery.steps.min.js')}}"></script>
    <!-- Jquery Validate -->
    <script src="{{asset('inspinia/js/plugins/validate/jquery.validate.min.js')}}"></script>
    <!-- Jasny -->
    <script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the student is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if student went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the student is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // // Suppress (skip) "Warning" step if the student is old enough and wants to the previous step.
                    // if (currentIndex === 2 && priorIndex === 3)
                    // {
                    //     $(this).steps("previous");
                    // }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            })
            .validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    password: {
                        equalTo: "#password"
                    }
                }
            });
            $('.i-checks').iCheck({
                radioClass: 'iradio_square-green',
            });
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

       });
    </script>
@endsection
