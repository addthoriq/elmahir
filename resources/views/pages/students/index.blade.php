@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Siswa</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Data Siswa</strong>
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
                <h5>Daftar Nama Siswa SMA Teladan Yogyakarta</h5>
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
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>No HP</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad Nasyith Asysyauqi</td>
                            <td>14171</td>
                            <td>089654327861</td>
                            <td><span class="label label-primary">Laki - Laki</span></td>
                            <td>
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i> Detail</button>
                                <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Susi Susanti</td>
                            <td>14172</td>
                            <td>082922829123</td>
                            <td><span class="label label-warning">Perempuan</span></td>
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