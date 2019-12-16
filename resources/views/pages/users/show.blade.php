@extends('layouts.app')

@section('title', 'Tambah Data User')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <style media="screen">
        .fileinput-preview.fileinput-exists.img-thumbnail img{
            max-width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data User</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}">Data User</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail User</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Profil User</h5>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a data-toggle="modal" class="dropdown-item" href="#editProfile">Ubah Profil</a>
                                </li>
                                <li><a data-toggle="modal" class="dropdown-item" href="#editAvatar">Ubah Poto Profil</a></li>
                            </ul>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>

                        @include('pages.users.edit')
                        @include('pages.users.editAvatar')


                    </div>

                    <div class="ibox-content">
                        @if (session('notif'))
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{session('notif')}}
                            </div>
                        @endif
                        <div class="text-center">
                            <h1>{{$data->name}}</h1>
                            <div class="m-b-sm">
                                @if ($data->avatar)
                                    <img alt="image" class="rounded-circle" src="{{Storage::url($data->avatar)}}" width="100px" height="100px">
                                @else
                                    <img alt="image" class="rounded-circle" src="{{Avatar::create($data->name)->toBase64()}}">
                                @endif
                            </div>
                            <div class="m-b-sm">
                                @if($data->role_id === 1)
                                    <span class='label label-warning'>Admin</span>
                                @elseif ($data->role_id === 2)
                                    <span class='label label-primary'>Operator 1</span>
                                @else
                                    <span class='label label-success'>Operator 2</span>
                                @endif
                            </div>
                            <div class="m-b-sm">
                                @if(!$data->status)
                                <form action="{{route('user.aktif', $data->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-xs btn-info" onclick='javascript:return confirm(`Apakah anda yakin ingin mengaktifkan {{$data->name}} ?`)'><i class="fa fa-check"></i> Aktifkan</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($data->status)
                                            <span class='label label-primary'>Aktif</span>
                                        @else
                                            <span class='label label-danger'>Tidak Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <th>Dibuat pada</th>
                                    <td>
                                        {{date('d F Y', strtotime($data->created_at))}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Diubah pada</th>
                                    <td>
                                        {{date('d F Y', strtotime($data->updated_at))}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if (!$data->status)
                            <form action="{{route('user.destroy',$data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('user.index')}}" class="btn btn-success"><i class="fa fa-chevron-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-danger pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)'><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        @else
                            <form action="{{route('user.destroy',$data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('user.index')}}" class="btn btn-success"><i class="fa fa-chevron-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-danger pull-right" disabled onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)'><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('pages.users.script')
@endsection
