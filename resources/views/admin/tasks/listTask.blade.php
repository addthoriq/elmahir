@extends('admin.layouts2.app')

@section('title', 'Tugas')

@section('style')
<link href="{{ asset('qlab/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mt-3 pb-0">
      <div class="col-md-6">
        <h4 class="section-title">Daftar Tugas</h4>
        <p class="section-lead mt-1"><i class="fas fa-angle-double-right text-primary"></i> Anda bisa melihat Tugas dari semua kelas.</p>
      </div>
      <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Tugas</li>
        </ol>
      </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion-two" class="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3"><i class="fa" aria-hidden="true"></i>Filter <small><i>(belum bisa digunakan)</i></small></h5>
                                </div>
                                <div id="collapseThree3" class="collapse" data-parent="#accordion-two">
                                    <div class="card-body">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group mb-0">
                                                        <label for="course">Nama Mapel</label>
                                                        <select name="course" class="form-control input-default">
                                                            <option value="">-- Pilih Mapel --</option>
                                                            @foreach ($listCourse as $data)                                        
                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-0">
                                                        <label for="classroom">Kelas</label>
                                                        <select name="classroom" class="form-control input-default">
                                                            <option value="">-- Pilih Kelas --</option>
                                                            @foreach ($classroom as $data)                                        
                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 d-flex align-items-end">
                                                    <button type="submit" class="btn btn-primary btn-sm"> Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-title">Daftar Tugas</div>
                            <div>
                                <a href="{{ route('task.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table dataTables table-striped" style="border-collapse: none !important; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Tugas</th>
                                        <th>Mapel</th>
                                        <th>Kelas</th>
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
                    { data: 'course', searchable: true, orderable: true},
                    { data: 'classroom', searchable: true, orderable: true},
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
