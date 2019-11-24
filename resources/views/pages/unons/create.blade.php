@extends('layouts.app')

@section('title', 'Tambah Data Guru')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <style media="screen">
        .fileinput-preview.fileinput-exists.img-thumbnail img{
            max-width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Guru</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('student.index') }}">Data Guru</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tambah Guru</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Tambah Data Guru</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="form" action="{{route('teacher.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3>Informasi Dasar</h3>
                                        <div class="form-group">
                                            <label>NIP *</label>
                                            <input id="nip" name="nip" type="number" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama *</label>
                                            <input id="name" name="name" type="text" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Masuk *</label>
                                            <input id="start_year" name="start_year" type="text" class="form-control ">
                                        </div>
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
                                    <div class="col-lg-6">
                                        <h3>Set Up Akun</h3>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input id="email" name="email" type="text" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label for="password1">Password *</label>
                                            <input id="password1" type="password" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Konfirmasi Password *</label>
                                            <input id="password" name="password" type="password" class="form-control ">
                                        </div>
                                        <label for="">Avatar</label>

                                        <div class="custom-file">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                              <div class="fileinput-new img-thumbnail" style="height: 160px;">
                                                <img src="https://via.placeholder.com/150">
                                              </div>
                                              <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                              <div>
                                                <span class="btn btn-outline-secondary btn-file">
                                                    <span class="fileinput-new">Pilih Gambar</span>
                                                    <span class="fileinput-exists">Ubah</span>
                                                    <input type="file" name="avatar">
                                                </span>
                                                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                              </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-success mt-4"><i class="fa fa-save"></i> Simpan</button>
                                        <button class="btn btn-danger mt-4"><i class="fa fa-trash"></i> Buang</button>
                                    </div>
                                </div>
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
