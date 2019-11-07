@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
    
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    
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
                                    <div class="col-lg-7">
                                        <h3>Deskripsi singkat</h3>
                                        
                                        <div class="form-group">
                                            <label for="name">Nama Mapel *</label>
                                            <input id="name" name="name" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="class_id">Untuk Kelas *</label>
                                            <select class="form-control" name="class_id">
                                                <option>-- Pilih Kelas --</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="teacher_id">Guru Pengajar *</label>
                                            <select class="form-control" name="teacher_id">
                                                <option>-- Pilih Guru Pengajar --</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="assistant">Asisten <i>(boleh kosong)</i></label>
                                            <input id="assistant" name="assistant" type="text" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-lg-5">
                                        <h3>Detail</h3>
                                        <div class="form-group">
                                            <label for="semester">Semester *</label>
                                            <input id="semester" name="semester" type="text" class="form-control">
                                        </div>

                                        <button class="btn btn-success">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>
                                        <button class="btn btn-danger">
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
    <!-- Steps -->
    <script src="{{asset('inspinia/js/plugins/steps/jquery.steps.min.js')}}"></script>
    <!-- Jquery Validate -->
    <script src="{{asset('inspinia/js/plugins/validate/jquery.validate.min.js')}}"></script>
    <!-- Jasny -->
    <script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- DROPZONE -->
    <script src="{{ asset('inspinia/js/plugins/dropzone/dropzone.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset('inspinia/js/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <!-- SUMMERNOTE -->
    <script src="{{ asset('inspinia/js/plugins/summernote/summernote-bs4.js') }}"></script>
    <!-- Data picker -->
    <script src="{{ asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script>
        Dropzone.options.dropzoneForm = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            dictDefaultMessage: "<strong>Letakkan file disini atau klik disini. </strong>"
        };
        $(document).ready(function(){
            $('.summernote').summernote();

            var date1 = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            var date2 = $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            }); 
       });
    </script>
@endsection
