@extends('layouts.app')

@section('title', 'Tambah Data Guru')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
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
                    <a href="{{ route('teacher.index') }}">Data Guru</a>
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
                                            <label class="{{$errors->has('nip')?"text-danger":""}}">NIP {{$errors->has('nip')?"*":""}}</label>
                                            <input id="nip" name="nip" type="number" value="{{old('nip')}}" class="form-control {{$errors->has('nip')?"border border-danger":""}}">
                                            @if ($errors->has('nip'))
                                                <span class="text-danger">{{$errors->first('nip')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="{{$errors->has('name')?"text-danger":""}}">Nama {{$errors->has('name')?"*":""}}</label>
                                            <input id="name" value="{{old('name')}}" name="name" type="text" class="form-control {{$errors->has('name')?"border border-danger":""}}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="{{$errors->has('start_year')?"text-danger":""}}">Tahun Masuk {{$errors->has('start_year')?"*":""}}</label>
                                            <input id="start_year" value="{{old('start_year')}}" maxlength="4" name="start_year" type="number" class="form-control {{$errors->has('start_year')?"border border-danger":""}}">
                                            @if ($errors->has('start_year'))
                                                <span class="text-danger">{{$errors->first('start_year')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="{{$errors->has('gender')?"text-danger":""}}">Jenis Kelamin {{$errors->has('gender')?"*":""}}</label>
                                            <div class="i-checks col-sm-6">
                                                <label class="{{$errors->has('gender')?"text-danger":""}}">
                                                    <input type="radio" value="L" value="{{old('gender')}}" name="gender">
                                                    <i></i>
                                                    Laki-Laki
                                                </label>
                                            </div>
                                            <div class="i-checks col-sm-6">
                                                <label class="{{$errors->has('gender')?"text-danger":""}}">
                                                    <input type="radio" value="P" value="{{old('gender')}}" name="gender">
                                                    <i></i>
                                                    Perempuan
                                                </label>
                                            </div>
                                            @if ($errors->has('gender'))
                                                <span class="text-danger">{{$errors->first('gender')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3>Pengaturan Akun</h3>
                                        <div class="form-group">
                                            <label class="{{$errors->has('email')?"text-danger":""}}" for="email">Email {{$errors->has('email')?"*":""}}</label>
                                            <input id="email" value="{{old('email')}}" name="email" type="text" class="form-control {{$errors->has('email')?"border border-danger":""}}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="{{$errors->has('password')?"text-danger":""}}" for="password">Password {{$errors->has('password')?"*":""}}</label>
                                            <input id="password" name="password" type="password" class="form-control {{$errors->has('password')?"border border-danger":""}}" placeholder="minimal 8 karakter">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{$errors->first('password')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="{{$errors->has('confirmation_password')?"text-danger":""}}" for="confirmation_password">Konfirmasi Password {{$errors->has('confirmation_password')?"*":""}}</label>
                                            <input id="confirmation_password" name="confirmation_password" type="password" class="form-control {{$errors->has('confirmation_password')?"border border-danger":""}}" placeholder="minimal 8 karakter">
                                            @if ($errors->has('confirmation_password'))
                                                <span class="text-danger">{{$errors->first('confirmation_password')}}</span>
                                            @endif
                                        </div>
                                        <label for="">Avatar</label>
                                        <div class="custom-file">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                              <div class="fileinput-new img-thumbnail" style="height: 160px;">
                                                <img src="{{asset('img/150.png')}}">
                                              </div>
                                              <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-success mt-4 pull-right" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                        <a class="btn btn-default mt-4" href="{{route('teacher.index')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <button class="btn btn-danger mt-4" type="reset"><i class="fa fa-trash"></i> Buang</button>
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
    <!-- Jquery Validate -->
    <script src="{{asset('inspinia/js/plugins/validate/jquery.validate.min.js')}}"></script>
    <!-- Jasny -->
    <script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function(){
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
