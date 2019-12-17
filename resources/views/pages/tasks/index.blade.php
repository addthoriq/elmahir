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
                        <a href="{{ route('task.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
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
                                    <th>Judul</th>
                                    <th>Mapel</th>
                                    <th>Kelas</th>
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
                    { data: 'title', searchable: true, orderable: true},
                    { data: 'course', searchable: true, orderable: true},
                    { data: 'classroom', searchable: true, orderable: true},
                    { data: 'action', searchable: true, orderable: true}
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
