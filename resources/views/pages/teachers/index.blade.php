@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Guru</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Data Guru</strong>
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
                <h5>Daftar Nama Guru SMA Teladan Yogyakarta</h5>
            </div>
            <div class="ibox-content">
            <div class="mb-3 mt-0">
                <a href="{{ route('teacher.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                <a href="" class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Import</a>
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-file-zip-o"></i> Import</a>
                <a href="{{route('unon.index')}}" class="btn btn-sm btn-info"><i class="fa fa-minus-square"></i> Guru Nonaktif</a>
            </div>
            @if (session('notif'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{session('notif')}}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTables-example" style="border-spacing:0px;">
                    <thead>
                        <tr>
                            <th style="width: 20px;">#</th>
                            <th>Avatar</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        var table;
        $(function() {
            table = $('.dataTables-example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{$ajax}}',
                order: [[0,'asc']],
                columns: [
                    { data: 'id', searchable: true, orderable: true},
                    { data: 'avatar', searchable: false, orderable: false},
                    { data: 'nip', searchable: true, orderable: true},
                    { data: 'name', searchable: true, orderable: true},
                    { data: 'gender', searchable: true, orderable: false},
                    { data: 'action', searchable: false, orderable: false}
                ],
                columnDefs: [{
                  "targets": 0,
                  "searchable": false,
                  "orderable": false,
                  "data": null,
                  "title": 'No',
                  "render": function (data, type, full, meta) {
                      return meta.settings._iDisplayStart + meta.row + 1;
                  }
                }],
            });
        });
    </script>
@endsection
