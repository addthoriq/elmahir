@extends('admin.layouts.app')

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
                    <a href="{{ route('course.index') }}">Data Mata Pelajaran</a>
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
                                    <div class="form-group">
                                        <label id="labelCourse" for="course">Nama Mata Pelajaran</label>
                                        <select required required id="course" class="form-control m-b" name="list_course">
                                            <option selected>-- Mata Pelajaran --</option>
                                            @foreach ($courses as $course)
                                                <option value="{{$course->name}}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="noticeName"></span>
                                        @if ($errors->has('list_course'))
                                            <span class="text-danger">{{$errors->first('list_course')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label id="labelUser" for="user_id">Guru Pengajar</label>
                                        <input required  id="user_id" type="text" name="user_id" autocomplete="off" data-provide="typeahead" class="typeahead form-control" />
                                        <span id="noticeUser"></span>
                                        @if ($errors->has('teacher'))
                                            <span class="text-danger">{{$errors->first('teacher')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label id="labelYearT" class="{{$errors->has('school_year_id')?"text-danger":""}}">Tahun Ajaran {{$errors->has('school_year_id')?"*":""}}</label>
                                        <select required id="year" class="form-control m-b" name="school_year_id">
                                            <option selected>-- Pilih Tahun Ajaran --</option>
                                            @foreach ($years as $year)
                                                <option value="{{$year->id}}">{{$year->start_year}}/{{$year->end_year}}</option>
                                            @endforeach
                                        </select>
                                        <span id="noticeSYear"></span>
                                        @if ($errors->has('school_year_id'))
                                            <span class="text-danger">{{$errors->first('school_year_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6" id="app">
                                    <div v-for="n in classrooms" :key="index">
                                        <div class="form-group">
                                            <label id="labelClassroom" for="classroom">Untuk Kelas</label>
                                            <select required class="form-control" name="classroom[]" id="classroom">
                                                <option>-- Pilih kelas --</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{$class->name}}">{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label id="labelAsistant" for="assistant">Asisten <i>(boleh kosong)</i></label>
                                            <input id="assistant" name="assistant[]" type="text" class="form-control">
                                            <span id="noticeAsistant"></span>
                                            @if ($errors->has('asistant'))
                                                <span class="text-danger">{{$errors->first('asistant')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" @click="delKelas()" class="btn btn-sm btn-warning"><i class="fa fa-minus"></i></button>
                                        <button type="button" @click="addKelas()" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
                                        <br><br>
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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                classrooms: 1,
            },
            methods:{
                addKelas(){
                    this.classrooms++;
                },
                delKelas(){
                    if (this.classrooms > 1) {
                        this.classrooms--;
                    }
                }
            }
        })
    </script>
    <script src="{{asset('inspinia/js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
    <script>
    var teacher = "{{route('course.teacher')}}";
        $(document).ready(function(){
            $.get(teacher, function(response){
                if (response == "") {
                    document.getElementById('user_id').readOnly = true;
                }else {
                    $('.typeahead').typeahead({
                        minLength: 3,
                        delay: 800,
                        source: response
                    });
                }
            })
            $("#course").blur(function(){
                var course = $("#course").val();
                if (course == "") {
                    $("#labelCourse").addClass('text-danger').text('Nama Mata Pelajaran *');
                    $("#course").addClass('border border-danger');
                    $("#noticeCourse").addClass('text-danger').text('Nama Mata Pelajaran Wajib diisi');
                    document.getElementById("tombol").disabled = true;
                }else {
                    $("#labelCourse").removeClass('text-danger').text('Nama Mata Pelajaran');
                    $("#course").removeClass('border border-danger');
                    $("#noticeCourse").removeClass('text-danger').text("");
                    document.getElementById("tombol").disabled = false;
                }
            })
            $("#user_id").blur(function(){
                var user_id = $("#user_id").val();
                if (user_id == "") {
                    $("#labelUser").addClass('text-danger').text('Guru Pengajar *');
                    $("#user_id").addClass('border border-danger');
                    $("#noticeUser").addClass('text-danger').text('Guru Pengajar Wajib diisi');
                    document.getElementById("tombol").disabled = true;
                }else {
                    $("#labelUser").removeClass('text-danger').text('Guru Pengajar');
                    $("#user_id").removeClass('border border-danger');
                    $("#noticeUser").removeClass('text-danger').text("");
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
              }else {
                $("#labelAssistant").removeClass('text-danger').text('Guru Pengganti');
                $("#assistant").removeClass('border border-danger');
                $("#textAsistant").removeClass('text-danger').text("");
                document.getElementById("tombol").disabled = true;
              }
            })
            $("#classroom").blur(function(){
                var selek = $("#classroom option:selected").val();
                if (selek == "") {
                    $("#labelClassroom").addClass('text-danger').text('Untuk Kelas *');
                    $("#classroom").addClass('border border-danger');
                    document.getElementById("tombol").disabled = true;
                }else {
                    $("#labelClassroom").removeClass('text-danger').text('Untuk Kelas');
                    $("#classroom").removeClass('border border-danger');
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
