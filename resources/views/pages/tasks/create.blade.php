@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('style')
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Tugas</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('student.index') }}">Data Tugas</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tambah Tugas</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Tambah Tugas</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="form" action="{{route('task.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row boxs">
                                    <div class="col-lg-7">
                                        <h3>Deskripsi singkat</h3>

                                        <div class="form-group">
                                            <label>Judul *</label>
                                            <input id="title" name="title" type="text" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Deskripsi *</label>
                                            <input id="description" name="description" type="text" class="form-control ">
                                        </div>

                                        <div class="form-group">
                                            <label for="optional" class="font-italic">Link dll...</label>
                                            <textarea name="optional" class="form-control" rows="5"></textarea>
                                        </div>

                                        <div class="btn-group">
                                            <button class="btn btn-primary border-right font-weight-bold">Tugaskan</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Tugaskan</a></li>
                                                <li><a class="dropdown-item" href="#">Jadwalkan</a></li>
                                                <li><a class="dropdown-item" href="#">Simpan draft</a></li>
                                            </ul>
                                            <button data-toggle="dropdown" class="btn btn-primary">
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <h3>Periode Tugas</h3>
                                        <p>Memberikan durasi Tugas dapat diakses siswa</p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="data_1">
                                                    <label class="font-normal">Tanggal Mulai</label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" class="form-control" name="start_periode">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="data_2">
                                                    <label class="font-normal">Tanggal Selesai</label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" class="form-control" name="end_periode">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Mata Pelajaran *</label>
                                            <select class="form-control m-b" name="course_id">
                                                <option>-- Pilih Mapel --</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->list_course}} - {{$course->classroom}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <h3 class="mt-4">Tambahkan File</h3>
                                        <p>Bisa upload file lebih dari satu</p>
                                        <div class="form-group">
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
                                                    <i class="fa fa-plus"></i> Tambah File
                                                </button>
                                            </div>
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
    <!-- Jasny -->
    <script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <!-- Data picker -->
    <script src="{{ asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $(document).ready(function(){
            var date1 = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "yyyy-mm-dd"
                // format: "dd-mm-yyyy"
            });

            var date2 = $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "yyyy-mm-dd"
                // format: "dd-mm-yyyy"
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
