@extends('layouts.app')

@section('title', 'Tambah Bab')

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
            <h2>Data Materi</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('student.index') }}">Data Materi</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tambah Materi</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Tambah Materi</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="form" action="{{route('student.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h3>Deskripsi singkat</h3>
                                        <div class="form-group">
                                            <label>Bab *</label>
                                            <input id="nisn" name="nisn" type="number" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Judul *</label>
                                            <input id="name" name="name" type="text" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Deskripsi *</label>
                                            <input id="email" name="email" type="text" class="form-control ">
                                        </div>
                                        <h3 class="mt-4">Isi Materi</h3>
                                        <div class="form-group">
                                            <div class="summernote">
                                            </div>
                                        </div>
                                        <label for="email">File  *</label>
                                        <div action="#" class="dropzone" id="dropzoneForm">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </div>
                                        <p>Anda bisa mengupload beberapa file sekaligus</p>
                                    </div>
                                    <div class="col-lg-5">
                                        <h3>Periode Materi</h3>
                                        <p>Memberikan durasi materi dapat diakses siswa</p>

                                        <div class="form-group" id="data_1">
                                            <label class="font-normal">Tanggal Mulai</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group" id="data_2">
                                            <label class="font-normal">Tanggal Selesai</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <h3 class="mt-4">Detail Materi</h3>
                                        <div class="form-group">
                                            <label>Mata Pelajaran *</label>
                                            <select class="form-control m-b" name="class_id">
                                                <option>-- Pilih Mapel --</option>
                                                {{-- @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Untuk Kelas *</label>
                                            <select class="form-control m-b" name="class_id">
                                                <option>-- Pilih Kelas --</option>
                                                {{-- @foreach ($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Publish</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Simpan</a></li>
                                                <li><a class="dropdown-item" href="#" class="font-bold">Publish</a></li>
                                                <li><a class="dropdown-item" href="#">Jadwalkan</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Buang
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" >
        
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
