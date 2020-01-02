@extends('admin.layouts2.app')
@section('title', 'Ubah Mata Pelajaran')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{route('list-course.index')}}">Daftar Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('list-course.create')}}">Ubah Mata Pelajaran</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <form action="{{route('list-course.update', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ubah Mata Pelajaran</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label id="labelName" for="name">Nama Mata Pelajaran</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-tag"></i></span>
                                            </div>
                                            <input required id="name" name="name" value="{{$data->name}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary pull-right" type="submit">Simpan <i class="fa fa-save"></i></button>
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
