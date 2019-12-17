@extends('admin.layouts.app')

@section('title', 'Tambah Data User')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
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
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('year.index') }}">Manajemen Tahun Ajar</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Ubah Tahun Ajar</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Tahun Ajar</h5>
                        <div class="ibox-tools">
                            @if ($data->status)
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <a data-toggle="modal" class="dropdown-item" href="#edit">Ubah Tahun Ajar</a>
                                    </li>
                                </ul>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            @else
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            @endif
                        </div>
                        @include('admin.years.edit')
                    </div>

                    <div class="ibox-content">
                        @if (session('notif'))
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{session('notif')}}
                            </div>
                        @endif
                        <table class="table">
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
                                            <span class="label label-primary">Saat ini</span>
                                        @else
                                            <span class="label label-danger">Telah berakhir</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($data->status)
                            <form action="{{route('year.update',$data->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <a href="{{route('year.index')}}" class="btn btn-success"><i class="fa fa-chevron-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-danger pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin mengakhiri Tahun Ajaran ini?`)'><i class="fa fa-minus-square"></i> Akhiri TA</button>
                            </form>
                        @else
                            <a href="{{route('year.index')}}" class="btn btn-success"><i class="fa fa-chevron-left"></i> Kembali</a>
                        @endif
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
    <script type="text/javascript">
        $('.i-checks').iCheck({
            radioClass: 'iradio_square-green',
        });
    </script>
@endsection
