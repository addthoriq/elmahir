@extends('admin.layouts2.app')
@section('title', 'Detail Ruang Kelas')
@section('style')
    <link href="{{asset('qlab/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <style media="screen">
        .fileinput-preview.fileinput-exists.img-thumbnail img{
            max-width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col pd-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{route('year.index')}}">Daftar Tahun Ajaran</a></li>
                    <li class="breadcrumb-item active"><a href="">Detail Tahun Ajaran</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- Modal disini --}}
                        @include('admin.years.edit')
                        <div class="card-body">
                            <a data-toggle="modal" class="btn btn-primary btn-sm mb-3" href="#edit"><i class="fa fa-wrench"></i> Ubah Tahun Ajaran</a>
                            @if (session('notif'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                                    {{session('notif')}}
                                </div>
                            @endif
                            <div class="card-title">
                                <h5>Informasi Kelas {{$data->name}}</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table header-border">
                                    <tbody>
                                        <tr>
                                            <th>Tahun Pertama (Semester 1)</th>
                                            <td>{{$data->start_year}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Kedua (Semester 2)</th>
                                            <td>{{$data->end_year}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if ($data->status)
                                                    <span class="badge badge-pill badge-success text-white">Saat ini</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Telah berakhir</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if ($data->status)
                                <form action="{{route('year.update',$data->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <a href="{{route('year.index')}}" class="btn btn-sm btn-light"><i class="fa fa-chevron-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-danger btn-sm pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin mengakhiri Tahun Ajaran ini?`)'><i class="fa fa-minus-square"></i> Akhiri TA</button>
                                </form>
                            @else
                                <a href="{{route('year.index')}}" class="btn btn-sm btn-light"><i class="fa fa-chevron-left"></i> Kembali</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#yf').bind('keypress', function(e){
                var keyCode = e.which ? e.which : e.keyCode;
                if (!(keyCode >= 48 && keyCode <= 57)) {
                    return false;
                }else {
                    return true;
                }
            });
            $('#ys').bind('keypress', function(e){
                var keyCode = e.which ? e.which : e.keyCode;
                if (!(keyCode >= 48 && keyCode <= 57)) {
                    return false;
                }else {
                    return true;
                }
            });
        })
    </script>
@endsection
