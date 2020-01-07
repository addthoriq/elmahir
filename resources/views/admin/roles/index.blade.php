@extends('admin.layouts2.app')
@section('title', 'Daftar Peran')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('duallistbox/src/bootstrap-duallistbox.css')}}">
    <script src="{{asset('duallistbox/src/jquery.bootstrap-duallistbox.js')}}"></script>
@endsection
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('role.index')}}">Daftar Peran</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Peran</h4>
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
                                            <th class="text-center">No</th>
                                            <th class="text-center">Peran</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no     = 1;
                                        @endphp
                                        @foreach ($roles as $rl)
                                            <tr>
                                                <td class="text-center">{{$no++}}</td>
                                                <td class="text-center">{{$rl->name}}</td>
                                                <td class="text-center">{{$rl->slug}}</td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#{{$rl->slug}}" class="btn btn-xs btn-warning text-white"><i class="fa fa-edit"></i></a>
                                                </td>
                                                @include('admin.roles.edit')
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
@section('script')

@endsection
