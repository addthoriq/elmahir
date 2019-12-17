@extends('admin.layouts.app')

@section('title', 'Data Kelas')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tahun Ajar</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('classroom.index') }}">Manajemen Kelas</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Manajemen Tahun Ajar</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Daftar Tahun Ajar</h5>
            </div>
            <div class="ibox-content">
                <div class="mb-3 mt-0">
                    <a data-toggle="modal" class="btn btn-sm btn-success" href="#store"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Export</a>
                    <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-file-zip-o"></i> Import</a>
                </div>
                @include('admin.years.create')
                @if (session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {{session('status')}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover dataTables-example" style="border-spacing:0px;">
                        <thead>
                            <tr>
                                <th style="width: 20px;">No</th>
                                <th>Semester 1</th>
                                <th>Semester 2</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')
    <!-- Jasny -->
    <script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            var table;
            $(function() {
                table = $('.dataTables-example').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{$ajax}}',
                    order: [[0,'asc']],
                    columns: [
                        { data: 'id', searchable: true, orderable: true},
                        { data: 'start_year', searchable: true, orderable: true},
                        { data: 'end_year', searchable: true, orderable: true},
                        { data: 'status', searchable: true, orderable: true},
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
            $('.i-checks').iCheck({
                radioClass: 'iradio_square-green',
            });
       });
    </script>
@endsection
