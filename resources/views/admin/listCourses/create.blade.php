@extends('admin.layouts2.app')
@section('title', 'Tambah Mata Pelajaran')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{route('list-course.index')}}">Daftar Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('list-course.create')}}">Tambah Mata Pelajaran</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <form action="{{route('list-course.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Daftar Mata Pelajaran</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-12" id="app">
                                        <label id="labelName" for="name">Nama Mata Pelajaran</label>
                                        <div class="input-group mb-3" v-for="n in classrooms" :key="index">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-tag"></i></span>
                                            </div>
                                            <input required id="name" name="name[]" type="text" class="form-control">
                                        </div>
                                        <button class="pull-right btn btn-sm btn-success text-white" type="button" @click="addKelas()"><i class="fa fa-plus"></i></button>
                                        <button class="pull-right btn btn-sm btn-warning text-white mr-1" type="button" @click="delKelas()"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
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
@endsection
