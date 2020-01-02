@extends('admin.layouts2.app')

@section('title', 'Materi')

@section('style')
<link href="{{ asset('qlab/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mt-3 pb-0">
      <div class="col-md-6">
        <h4 class="section-title">Daftar Materi</h4>
        <p class="section-lead mt-1"><i class="fas fa-angle-double-right text-primary"></i> Anda bisa melihat materi dari semua kelas.</p>
      </div>
      <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Materi</li>
        </ol>
      </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Filter</div>
                        <form action="">
                            <div class="form-group">
                                <label for="course">Nama Mapel</label>
                                <select name="course" class="form-control input-default">
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach ($listCourse as $data)                                        
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="classroom">Kelas</label>
                                <select name="classroom" class="form-control input-default">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($classroom as $data)                                        
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"> Submit</button>
                        </form>
                        <small><i>(belum bisa dipakai)</i></small>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title">Daftar Materi</div>
                            <div>
                                <a href="{{ route('section.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table dataTables table-striped" style="border-collapse: none !important; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Materi</th>
                                        <th>Dibuat</th>
                                        <th>Author</th>
                                        <th>File</th>
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
            ajax: '{{$ajax}}',
            order: [[0,'asc']],
            columns: [
                { data: 'id', searchable: true, orderable: true},
                { data: 'title', searchable: true, orderable: true},
                { data: 'created_at', searchable: true, orderable: true},
                { data: 'user_id', searchable: true, orderable: true},
                { data: 'file', searchable: true, orderable: true},
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
