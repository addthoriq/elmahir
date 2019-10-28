@extends('layouts.app')

@section('title', 'Tugas')

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Daftar Tugas</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Data Tugas</strong>
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
                <h5>Daftar Tugas</h5>
            </div>
            <div class="ibox-content">
                <div class="mb-3 mt-0">
                <button class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Tambah</button>
                <button class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Import</button>
                <button class="btn btn-sm btn-primary"><i class="fa fa-file-zip-o"></i> Import</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTables-example" style="border-spacing:0px;">
                    <thead>
                        <tr>
                            <th style="width: 20px;">#</th>
                            <th>Judul</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Mandiri</span>
                            </td>
                            <td class="project-title">
                                <a href="project_detail.html">Mengerjakan latihan soal bab 1</a>
                                <br/>
                                <small class="mr-3"><i class="fa fa-comments-o"></i> Komentar (2)</small>
                                <small class="mr-3"><i class="fa fa-clock-o"></i> 1 jam yang lalu</small>
                                <small class="mr-3"><i class="fa fa-user"></i> Ahmad Sudibyo</small>                                    
                            </td>
                            <td>
                                <span class="label label-primary">Kelas I</span>
                            </td>
                            <td>
                                <span class="label label-primary">Dikumpulkan</span>
                            </td>
                            <td class="project-actions">
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="project-status">
                                <span class="label label-info">Kelompok</span>
                            </td>
                            <td class="project-title">
                                <a href="project_detail.html">Membuat makalah tanaman hias</a>
                                <br/>
                                <small class="mr-3"><i class="fa fa-comments-o"></i> Komentar (32)</small>
                                <small class="mr-3"><i class="fa fa-clock-o"></i> 1 Hari yang lalu</small>
                                <small class="mr-3"><i class="fa fa-user"></i> Muhammad Qudus</small>                                    
                            </td>
                            <td>
                                <span class="label label-primary">Kelas I</span>
                            </td>
                            <td>
                                <span class="label label-primary">Dikumpulkan</span>
                            </td>
                            <td class="project-actions">
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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