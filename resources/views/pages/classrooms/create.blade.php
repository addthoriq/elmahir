@extends('layouts.app')

@section('title', 'Tambah Data User')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/cropper/cropper.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Kelas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('classroom.index') }}">Data Kelas</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tambah Kelas</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight" id="app">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Tambah Data Kelas</h5>
                    </div>
                    <div class="ibox-content">
                        <h2>
                            Data Kelas
                        </h2>
                        <p>
                            Data Kelas ini merujuk pada Kelas-Kelas yang ada di sekolah
                        </p>

                        <form id="form" action="{{route('classroom.store')}}" class="wizard-big" method="post">
                            @csrf

                            <h1>Informasi Kelas</h1>
                            <fieldset>
                                <h2>Informasi data Kelas</h2>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama Kelas *</label>
                                            <input id="name" type="text" name="name" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label for="teacher_id">Wali Kelas *</label>
                                            <input id="teacher_id" type="text" name="teacher_id" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label for="max_student">Jumlah Maksimal Siswa *</label>
                                            <input id="max_student" type="number" name="max_student" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h1>Pengecekan Ulang</h1>
                            <fieldset>
                                <h2>Konfirmasi Ulang</h2>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama Kelas *</label>
                                            <input id="cn" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="teacher_id">Wali Kelas *</label>
                                            <input id="tn" type="text" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="max_student">Jumlah Maksimal Siswa *</label>
                                            <input id="ms" type="number" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h1>Selesai</h1>
                            <fieldset>
                                <h2>Syarat dan Ketentuan Berlaku</h2>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class=""> <label for="acceptTerms">Saya menyetujui untuk membuat User baru</label>
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
    <script>
        $(document).ready(function(){
            function k(){
                var k = $("#name").val();
                $("#cn").val(k);
            }
            $("#cn").focus(function(){
                k();
            });
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

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
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
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 3)
                    {
                        $(this).steps("next");
                    }

                    // // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
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
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
       });
    </script>
@endsection
