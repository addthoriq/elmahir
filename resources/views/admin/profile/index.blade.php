@extends('admin.layouts2.app')
@section('title', 'Data User')
@section('style')
    <link href="{{ asset('qlab/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('qlab/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
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
                    <li class="breadcrumb-item active"><a href="">Profil dan Pengaturan</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- Modal disini --}}
                        @include('admin.profile.edit')
                        @include('admin.profile.editProfile')
                        @include('admin.profile.editAvatar')
                        <div class="card-body">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Profil dan Pengaturan</button>
                                <div class="dropdown-menu">
                                    <a data-toggle="modal" class="dropdown-item" href="#editAccount"><i class="fa fa-wrench"></i> Pengaturan Akun</a>
                                    <a data-toggle="modal" class="dropdown-item" href="#editProfile"><i class="fa fa-user"></i> Profil</a>
                                    <a data-toggle="modal" class="dropdown-item" href="#editAvatar"><i class="fas fa-image"></i> Poto Profil</a>
                                </div>
                            </div>
                            @if (session('notif'))
                                <div class="alert alert-success alert-dismissable mt-3">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{session('notif')}}
                                </div>
                            @endif
                            <div class="text-center mb-3">
                                @if ($data->avatar)
                                    <img alt="image" class="rounded-circle mt-2" src="{{Storage::url($data->avatar)}}" width="100px" height="100px">
                                @else
                                    <img alt="image" class="rounded-circle mt-2" src="{{Avatar::create($data->name)->toBase64()}}">
                                @endif
                                <h4 class="my-3">{{$data->name}}</h4>
                                @if ($data->role_id == 1)
                                    <span class='label label-pill label-warning'>Admin</span>
                                @elseif ($data->role_id == 2)
                                    <span class='label label-pill label-info'>Operator 1</span>
                                @elseif ($data->role_id == 3)
                                    <span class='label label-pill label-success'>Operator 2</span>
                                @else
                                    <span class='label label-pill label-primary'>Pengajar</span>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <h5>Informasi Pribadi</h5>
                                <table class="table header-border">
                                    <tbody>
                                        <tr>
                                            <th>Tahun Masuk</th>
                                            <td>{{$data->start_year}}</td>
                                        </tr>
                                        <tr>
                                            <th>NIP</th>
                                            <td>{{$data->nip}}</td>
                                        </tr>
                                        <tr>
                                            <th>NIK</th>
                                            <td>
                                                @isset($data->profileUser->nik)
                                                    {{$data->profileUser->nik}}
                                                @else
                                                    <i>Data Belum ditambahkan</i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>
                                                @if ($data->gender == 'L')
                                                    <span class='label label-pill label-primary'>Laki-Laki</span>
                                                @else
                                                    <span class='label label-pill label-warning text-white'>Perempuan</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Agama</th>
                                            <td>
                                                @isset($data->profileUser->religion)
                                                    {{$data->profileUser->religion}}
                                                @else
                                                    <i>Data Belum ditambahkan</i>
                                                @endif
                                            </td>
                                        </tr>
                                    </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>
                                                @isset($data->profileUser->address)
                                                    {{$data->profileUser->address}}
                                                @else
                                                    <i>Data Belum ditambahkan</i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TTL</th>
                                            <td>
                                                @isset($data->profileUser->date_of_birth)
                                                    {{$data->profileUser->place_of_birth}}, {{date('d F Y', strtotime($data->profileUser->date_of_birth))}}
                                                @else
                                                    <i>Data Belum ditambahkan</i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Hp</th>
                                            <td>
                                                @isset($data->profileUser->phone_number)
                                                    {{$data->profileUser->phone_number}}
                                                @else
                                                    <i>Data Belum ditambahkan</i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Akun dibuat pada</th>
                                            <td>
                                                {{date('d F Y', strtotime($data->created_at))}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tutup Akun</th>
                                            <td>
                                                <form action="{{route('profile.unon',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-danger" onclick='javascript:return confirm(`Apakah anda yakin ingin menutup akun ini?`)'>Saya ingin menutup akun ini</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{route('home.index')}}" class="btn btn-sm btn-light"><i class="fa fa-chevron-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.profile.script')
@endsection
