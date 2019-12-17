@extends('layouts.app')

@section('title', 'Tambah Materi')

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
                        <form id="form" action="{{route('section.store')}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row boxs">
                                    <div class="col-lg-7">
                                        <h3>Deskripsi singkat</h3>
                                        <div class="form-group">
                                            <label>Mapel</label>
                                            <input id="courseName" name="courseName" type="text" class="form-control" value="{{ $course->list_course }} - {{ $course->classroom }}" disabled>
                                            <input id="course_id" name="course_id" type="hidden" class="form-control" value="{{ $course->id }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Materi *</label>
                                            <input id="title" name="title" type="text" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Deskripsi *</label>
                                            <input id="description" name="description" type="text" class="form-control ">
                                        </div>
                                        <label class="mt-4">Isi Materi <small><i>(optional)</i></small></label>
                                        <div class="form-group">
                                            <div class="summernote">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <h3>Multiple File Upload</h3>
                                        <p>Meng-upload beberapa files sekaligus.</p>
                                        <label for="email">File  *</label>
                                        <div class="erase">
                                            <div class="row bg-muted p-2">
                                                <div class="col-md-10">
                                                    <div class="fileinput fileinput-new m-0" data-provides="fileinput">
                                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih File...</span>
                                                        <span class="fileinput-exists">Ubah</span><input type="file" name="file[]"/></span>
                                                        <span class="fileinput-filename"></span>
                                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <button type="button" class="btn btn-success btn-sm" id="add">
                                                <i class="fa fa-plus"></i> Tambah
                                            </button>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-send"></i> Publish</button>
                                        </div>
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

            $("#add").click(function(){
                  $(".erase").after("<div class='row clone bg-muted p-2'><div class='col-md-10'><div class='fileinput fileinput-new m-0' data-provides='fileinput'><span class='btn btn-default btn-file'><span class='fileinput-new'>Pilih File...</span><span class='fileinput-exists'>Ubah</span><input type='file' name='file[]'/></span><span class='fileinput-filename'></span></div> </div><div class='col-md-2'><button type='button' class='btn btn-lg btn-danger'><i class='fa fa-close'></i></button></div></div>");
                });

            $(".boxs").on("click",".btn-danger",function(){
                $(this).parents(".clone").remove();
            });
       });
    </script>
@endsection
