@extends('admin.layouts2.app')
@section('title', 'Daftar Hak Akses')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('perm.home')}}">Daftar Hak Akses</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Hak Akses</h4>
                            <a href="#" class="btn mb-4 btn-rounded btn-success btn-sm text-white"><i class="fas fa-download"></i> Ekspor</a>
                            <a href="#" class="btn mb-4 btn-rounded btn-info btn-sm pull-right"><i class="fa fa-print"></i> Cetak</a>
                            @if (session('notif'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                                    {{session('notif')}}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTables-example">
                                    <thead>
                                        <tr>
                                            <th  class="text-center">No</th>
                                            <th  class="text-center">Role</th>
                                            <th  class="text-center">Slug</th>
                                            <th  class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no     = 1;
                                        @endphp
                                        @foreach ($roles as $rl)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$rl->name}}</td>
                                                <td>{{$rl->slug}}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#{{$rl->slug}}" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit"></i></a>
                                                    @include('admin.roles.perm-edit')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
