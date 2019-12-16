@extends('layouts.app')

@section('title', 'Ubah Mata Pelajaran')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('css/typehead.css')}}" rel="stylesheet">
    <style>
        .typeahead{
            z-index: 5000;
        }
    </style>
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Daftar Mata Pelajaran</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}">Mata Pelajaran</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course-detail.index') }}">Daftar Mata Pelajaran</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Ubah Mata Pelajaran</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Ubah Mata Pelajaran</h5>
                    </div>
                    <div class="ibox-content">
                        @if (session('notif'))
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{session('notif')}}
                            </div>
                        @endif
                        <form id="form" action="{{route('course-detail.update',$data->id)}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label id="labelName" for="name">Nama Mata Pelajaran</label>
                                        <input id="name" name="name" type="text" value="{{$data->name}}" autocomplete="off" class="form-control">
                                        <span id="noticeName"></span>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button id="tombol" disabled class="btn btn-success pull-right" type="submit">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <a class="btn btn-default" href="{{route('course.index')}}">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                    <button class="btn btn-danger" type="reset">
                                        <i class="fa fa-trash"></i> Batal
                                    </button>
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
    <script src="{{asset('inspinia/js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
    <script>
    var teacher = "{{route('course.teacher')}}";
        $(document).ready(function(){
            $("#name").blur(function(){
                var name = $("#name").val();
                if (name == "") {
                    $("#labelName").addClass('text-danger').text('Nama Mata Pelajaran *');
                    $("#name").addClass('border border-danger');
                    $("#noticeName").addClass('text-danger').text('Nama Mata Pelajaran Wajib diisi');
                    document.getElementById("tombol").disabled = true;
                }else if (name.length < 5 || name.length >= 100) {
                    $("#labelName").addClass('text-danger').text('Nama Mata Pelajaran *');
                    $("#name").addClass('border border-danger');
                    $("#noticeName").addClass('text-danger').text('Nama Mata Pelajaran minimal 5 karakter dan maksimal 100 karakter');
                    document.getElementById("tombol").disabled = true;
                }else {
                    $("#labelName").removeClass('text-danger').text('Nama Mata Pelajaran');
                    $("#name").removeClass('border border-danger');
                    $("#noticeName").removeClass('text-danger').text("");
                    document.getElementById("tombol").disabled = false;
                }
            })
        })
    </script>
@endsection
