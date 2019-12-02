@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')

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
            <h2>Data Mata Pelajaran</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('student.index') }}">Data Mata Pelajaran</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tambah Mapel</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Tambah Mata Pelajaran</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="form" action="{{route('course.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>Deskripsi singkat</h3>
                                    <div class="form-group">
                                        <label for="name">Nama Mapel</label>
                                        <input id="name" name="name" type="text" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="teacher_id">Guru Pengajar</label>
                                        <input type="text" name="teacher_id" autocomplete="off" data-provide="typeahead" class="typeahead form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="classroom_id">Untuk Kelas</label>
                                        <select class="form-control" name="classroom_id">
                                            <option>-- Pilih Kelas --</option>
                                            @foreach ($classes as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label id="labelYear" class="{{$errors->has('school_year_id')?"text-danger":""}}">Tahun Ajaran {{$errors->has('school_year_id')?"*":""}}</label>
                                        <select id="year" class="form-control m-b" name="school_year_id">
                                            <option selected value="">-- Pilih Tahun Ajaran --</option>
                                            @foreach ($years as $year)
                                                <option value="{{$year->id}}">{{$year->start_year}}/{{$year->end_year}}</option>
                                            @endforeach
                                        </select>
                                        <span id="noticeSYear"></span>
                                        @if ($errors->has('school_year_id'))
                                            <span class="text-danger">{{$errors->first('school_year_id')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester *</label>
                                        <input id="semester" name="semester" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="assistant">Asisten <i>(boleh kosong)</i></label>
                                        <input id="assistant" name="assistant" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-success pull-right" type="submit">
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
            $.get(teacher, function(response){
                $('.typeahead').typeahead({
                    minLength: 3,
                    delay: 800,
                    source: response
                });
            })
        })
    </script>
@endsection
