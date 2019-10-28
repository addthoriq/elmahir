@extends('layouts.app')

@section('title', 'Data Mapel')

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Mata Pelajaran</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Data Mata Pelajaran</strong>
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
                <h5>Daftar Mata Pelajaran</h5>
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
                            <th>Nama Mapel</th>
                            <th>Kode</th>
                            <th>Pengajar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Bahasa Indonesia</td>
                            <td>A101</td>
                            <td class="d-flex align-items-start">
                                <ul class="pl-2">
                                    <li>Suradi, S.Pd</li>
                                    <li>Subagyo, S.Kom</li>
                                    <li>Sudibyo, S.Pd</li>
                                </ul>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i> Detail</button>
                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
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