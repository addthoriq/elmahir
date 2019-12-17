@extends('admin.layouts.app')
@section('title', 'Tambah Mata Pelajaran')
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
                <li class="breadcrumb-item">
                    <a href="{{ route('course-detail.index') }}">Daftar Mata Pelajaran</a>
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
                        <form id="form" action="{{route('course-detail.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <labelfor="name">Nama Mata Pelajaran</label>
                                </div>
                            </div>
                            <div class="row" id="app">
                                <div class="col-lg-10" v-for="n in classrooms" :key="index">
                                    <div class="form-group">
                                        <input id="name" type="text" required name="name[]" class="form-control" autocomplete="off">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-sm btn-warning" type="button" @click="delKelas()"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-sm btn-primary" type="button" @click="addKelas()"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button id="tombol" class="btn btn-success pull-right" type="submit">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                    <a class="btn btn-default" href="{{route('course-detail.index')}}">
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
@endsection
