@extends('layouts.app')

@section('title', 'Materi')

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Daftar Materi</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Data Materi</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Daftar Materi</h5>
            </div>
            <div class="ibox-content">
                <div class="mb-3 mt-0">
                <a href="{{ route('section.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Import</a>
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-file-zip-o"></i> Import</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTables-example" style="border-spacing:0px;">
                    <thead>
                        <tr>
                            <th style="width: 20px;">#</th>
                            <th>Judul</th>
                            <th>Kelas</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Bab 1</span>
                            </td>
                            <td class="project-title">
                                <a href="project_detail.html">Mengenal Asmaul Husna</a>
                                <br/>
                                <small class="mr-3"><i class="fa fa-comments-o"></i> Komentar (32)</small>
                                <small class="mr-3"><i class="fa fa-calendar"></i> 25 September 2019</small>
                                <small class="mr-3"><i class="fa fa-user"></i> Muhammad Qudus</small>                                    
                            </td>
                            <td>
                                <span class="label label-primary">Kelas I</span>
                            </td>
                            <td>
                                <span class="label label-danger">PDF</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Terbitkan </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Detail </a>
                                <a href="#" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection