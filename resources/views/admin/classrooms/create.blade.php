@extends('admin.layouts.app')

@section('title', 'Tambah Data User')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Informasi Dasar</h3>
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
                                    <button class="btn btn-success mt-4 pull-right" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                    <a class="btn btn-default mt-4" href="{{route('classroom.index')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
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
