@extends('admin.layouts2.app')

@section('title', 'Answer Task')

@section('style')
<link href="{{ asset('qlab/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mt-3 pb-0">
      <div class="col-md-6">
        <h4 class="section-title">Daftar Assessment</h4>
        <p class="section-lead mt-1"><i class="fas fa-angle-double-right text-primary"></i> Anda bisa melihat daftar siswa yang telah mengumpulkan tugas.</p>
      </div>
      <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Daftar Tugas</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title">Pengajar : {{ $task->course->user->name }}</div>
                            <div>                                
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table dataTables table-striped" style="border-collapse: none !important; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Status</th>
                                        <th>Score</th>
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
    <!-- #/ container -->
</div>
@endsection

@section('script')
    <script src="{{ asset('qlab/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('qlab/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('qlab/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
    <script type="text/javascript">
        var table;
        $(function() {
            table = $('.dataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ $ajax }}',
                order: [[0,'asc']],
                columns: [
                    { data: 'id', searchable: true, orderable: true},
                    { data: 'student_id', searchable: true, orderable: true},
                    { data: 'status', searchable: true, orderable: true},
                    { data: 'score', searchable: true, orderable: true},
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