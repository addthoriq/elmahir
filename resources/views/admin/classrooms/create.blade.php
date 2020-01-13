@extends('admin.layouts2.app')
@section('title', 'Tambah Ruang Kelas')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{route('classroom.index')}}">Daftar Ruang Kelas</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('classroom.create')}}">Tambah Ruang Kelas</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <form action="{{route('classroom.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" id="app">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title">Tambah Ruang Kelas</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12" id="app">
                                        <label id="labelName" for="name">Nama Kelas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-tag"></i></span>
                                            </div>
                                            <input required id="name" name="name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="labelName" for="user_id">Nama Wali Kelas</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input required id="user_id" name="user_id" type="text" autocomplete="off" data-provide="typeahead" class="typeahead form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="labelName" for="max_student">Jumlah maksimal Siswa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-flag"></i></span>
                                            </div>
                                            <input required id="max_student" name="max_student" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Anggota Kelas</label>
                                        <div class="input-group">
                                            <select class="custom-select" name="student_id[]" multiple id="student_id"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary pull-right" type="submit">Tambah <i class="fa fa-send"></i></button>
                                        <a href="{{route('classroom.index')}}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <button class="btn btn-danger" type="reset"><i class="fas fa-trash"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{asset('qlab/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
    <script>
    var teacher = "{{route('teacher.json')}}";
    var student = "{{route('student.json')}}";
    $(document).ready(function(){
        $('#student_id').select2({
            ajax: {
                url: student,
                processResults: function(data){
                    return {
                        results: data.map(function(item){
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    }
                }
            }
        });
        $.get(teacher, function(response){
            if (response == "") {
                document.getElementById('user_id').readOnly = true;
            }else {
                $('.typeahead').typeahead({
                    source: response
                });
            }
        })
    })
    </script>
@endsection
