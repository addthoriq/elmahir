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
            <h2>Data Mata Pelajaran</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}">Data Mata Pelajaran</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Ubah Mapel</strong>
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
                        <form id="form" action="{{route('course.update',$data->id)}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label id="labelName" for="name">Nama Mapel</label>
                                        <input id="name" name="name" type="text" value="{{$data->name}}" autocomplete="off" class="form-control">
                                        <span id="noticeName"></span>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label id="labelTeacher" for="teacher_id">Guru Pengajar</label>
                                        <input id="teacher_id" type="text" name="teacher_id" value="{{$data->teacher->name}}" autocomplete="off" data-provide="typeahead" class="typeahead form-control" />
                                        <span id="noticeTeacher"></span>
                                        @if ($errors->has('teacher'))
                                            <span class="text-danger">{{$errors->first('teacher')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label id="labelClassroom" for="classroom_id">Untuk Kelas</label>
                                        <select class="form-control" name="classroom_id[]" id="classroom_id">
                                            <option value="{{$data->classroom_id}}">-- {{$data->classroom->name}} --</option>
                                            @foreach ($classes as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label id="labelYearT" class="{{$errors->has('school_year_id')?"text-danger":""}}">Tahun Ajaran {{$errors->has('school_year_id')?"*":""}}</label>
                                        <select id="year" class="form-control m-b" name="school_year_id">
                                            <option selected value="{{$history->school_year->id}}">-- {{$history->school_year->start_year}}/{{$history->school_year->end_year}} --</option>
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
                                        <label id="labelAsistant" for="assistant">Asisten <i>(boleh kosong)</i></label>
                                        <input id="assistant" name="assistant" type="text" value="{{($data->assistant)?$data->assistant:''}}" class="form-control">
                                        <span id="noticeAsistant"></span>
                                        @if ($errors->has('asistant'))
                                            <span class="text-danger">{{$errors->first('asistant')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button id="tombol" class="btn btn-success pull-right" disabled type="submit">
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
            $("#teacher_id").blur(function(){
                var teacher_id = $("#teacher_id").val();
                if (teacher_id == "") {
                    $("#labelTeacher").addClass('text-danger').text('Nama Mata Pelajaran *');
                    $("#teacher_id").addClass('border border-danger');
                    $("#noticeTeacher").addClass('text-danger').text('Nama Mata Pelajaran Wajib diisi');
                    document.getElementById("tombol").disabled = true;
                }else if (teacher_id.length < 5 || teacher_id.length >= 100) {
                    $("#labelTeacher").addClass('text-danger').text('Nama Mata Pelajaran *');
                    $("#teacher_id").addClass('border border-danger');
                    $("#noticeTeacher").addClass('text-danger').text('Nama Mata Pelajaran minimal 5 karakter dan maksimal 100 karakter');
                    document.getElementById("tombol").disabled = true;
                }else {
                    $("#labelTeacher").removeClass('text-danger').text('Nama Mata Pelajaran');
                    $("#teacher_id").removeClass('border border-danger');
                    $("#noticeTeacher").removeClass('text-danger').text("");
                    document.getElementById("tombol").disabled = false;
                }
            })
            $("#assistant").blur(function(){
              var passNew   = $("#assistant").val();
              if (passNew == "") {
                  $("#textAsistant").removeClass('text-danger').text("").append("<i>Guru Pengganti minimal 8 karakter</i>");
                  $("#labelAssistant").removeClass('text-danger').text('Guru Pengganti');
                  $("#assistant").removeClass('border border-danger');
                  document.getElementById("tombol").disabled = false;
              }else if (passNew.length < 4) {
                $("#labelAssistant").addClass('text-danger').text('Guru Pengganti *');
                $("#assistant").addClass('border border-danger');
                $("#textAsistant").addClass('text-danger').text("Masukkan minimal 8 Karakter");
                document.getElementById("tombol").disabled = true;
              }else {
                $("#labelAssistant").removeClass('text-danger').text('Guru Pengganti');
                $("#assistant").removeClass('border border-danger');
                $("#textAsistant").removeClass('text-danger').text("");
                document.getElementById("tombol").disabled = true;
              }
            })
            $("#classroom_id").blur(function(){
                var selek = $("#classroom_id option:selected").val();
                if (selek == "") {
                    $("#labelClassroom").addClass('text-danger').text('Untuk Kelas *');
                    $("#classroom_id").addClass('border border-danger');
                    document.getElementById("tombol").disabled = true;
                }else {
                    $("#labelClassroom").removeClass('text-danger').text('Untuk Kelas');
                    $("#classroom_id").removeClass('border border-danger');
                    document.getElementById("tombol").disabled = false;
                }
            })
            $("#year").blur(function(){
                var selek = $("#year option:selected").val();
                if (selek == "") {
                    $("#labelYearT").addClass('text-danger').text('Tahun Ajaran *');
                    $("#year").addClass('border border-danger');
                    document.getElementById("tombol1").disabled = true;
                }else {
                    $("#labelYearT").removeClass('text-danger').text('Tahun Ajaran');
                    $("#year").removeClass('border border-danger');
                    document.getElementById("tombol1").disabled = false;
                }
            })
        })
    </script>
@endsection
