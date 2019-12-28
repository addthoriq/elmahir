
@extends('admin.layouts.app')

@section('title', 'Data Guru')

@section('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Daftar Guru</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="#">Beranda</a></div>
      <div class="breadcrumb-item">Daftar Guru</div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="">
              <a href="{{ route('teacher.create') }}" class="btn btn-primary">Tambah Data</a>
              <a href="" class="btn btn-success">Ekspor</a>
            </div>
            <a href="" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
          </div>
          <div class="card-body">
            @if (session('notif'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{session('notif')}}
                </div>
            @endif
            <div class="table-responsive">
              <table class="table table-striped table-hover dataTables-example">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
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
</section>
@endsection

@section('script')
<!-- JS Libraies -->
<script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('stisla/assets/js/page/modules-datatables.js') }}"></script>
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
