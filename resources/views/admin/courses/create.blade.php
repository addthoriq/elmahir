@extends('admin.layouts2.app')
@section('title', 'Tambah Mata Pelajaran')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{route('course.index')}}">Daftar Pengajar & Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('course.create')}}">Tambah Pengajar Mata Pelajaran</a></li>
                </ol>
            </div>
    </div>
    <div class="container-fluid">
        <form id="form" action="{{route('course.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="app">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title">Tambah Daftar Mata Pelajaran</h4>
                                </div>
                                <div class="col">
                                    <button class="pull-right btn btn-sm btn-warning mb-2 text-white ml-1" type="button" @click="delKelas()"><i class="fa fa-minus"></i></button>
                                    <button class="pull-right btn btn-sm btn-success mb-2 text-white" type="button" @click="addKelas()"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label id="labelCourse" for="course">Nama Mata Pelajaran</label>
                                        <select required required id="course" class="form-control m-b" name="list_course">
                                            <option selected>-- Mata Pelajaran --</option>
                                            @foreach ($courses as $course)
                                                <option value="{{$course->name}}">{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label id="labelTeacher" for="user_id">Nama Pengajar</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input required  id="user_id" type="text" name="user_id" autocomplete="off" data-provide="typeahead" class="typeahead form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label id="labelYearT" class="{{$errors->has('school_year_id')?"text-danger":""}}">Tahun Ajaran {{$errors->has('school_year_id')?"*":""}}</label>
                                        <select required id="year" class="form-control m-b" name="school_year_id">
                                            <option selected>-- Pilih Tahun Ajaran --</option>
                                            @foreach ($years as $year)
                                                <option value="{{$year->id}}">{{$year->start_year}}/{{$year->end_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row" v-for="n in classrooms" :key="index">
                                        <div class="col-12">
                                            <div class="form-group" >
                                                <label id="labelClassroom" for="classroom">Untuk Kelas</label>
                                                <select required class="form-control" name="classroom[]" id="classroom">
                                                    <option>-- Pilih kelas --</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{$class->name}}">{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label id="labelName" for="name">Pengajar Pengganti</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input required id="name" name="name[]" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary pull-right" type="submit">Tambah <i class="fa fa-send"></i></button>
                                    <a href="{{route('list-course.index')}}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <button class="btn btn-danger" type="reset"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
        })
    </script>
@endsection
