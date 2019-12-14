@extends('layouts.app')

@section('title', 'Data Guru')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <style media="screen">
        .fileinput-preview.fileinput-exists.img-thumbnail img{
            max-width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Guru</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('teacher.index') }}">Data Guru</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Guru</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Profil Guru</h5>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a data-toggle="modal" class="dropdown-item" href="#editAccount">Ubah Akun</a></li>
                                <li><a data-toggle="modal" class="dropdown-item" href="#editProfile">Ubah Profil</a></li>
                                <li><a data-toggle="modal" class="dropdown-item" href="#editAvatar">Ubah Poto Profil</a></li>
                            </ul>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>

                        {{-- Modal disini --}}
                        @include('pages.teachers.editAccount')
                        @include('pages.teachers.editProfile')
                        @include('pages.teachers.editAvatar')


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
                                @if ($user)
                                    @if($data->status)
                                        <span class='label label-success'>Pengajar Aktif</span>
                                    @endif
                                    @if ($usr->status)
                                        @if ($usr->role_id == 1)
                                            <span class='label label-warning'>Admin</span>
                                        @elseif ($usr->role_id == 2)
                                            <span class='label label-primary'>Operator 1</span>
                                        @else
                                            <span class='label label-success'>Operator 2</span>
                                        @endif
                                    @endif
                                @else
                                    <span class='label label-success'>Pengajar Aktif</span>
                                @endif
                            </div>
                        </div>
                        <table class="table">
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
                                        @isset($data->profileTeacher->nik)
                                            {{$data->profileTeacher->nik}}
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
                                            <span class='label label-primary'>Laki-Laki</span>
                                        @else
                                            <span class='label label-success'>Perempuan</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td>
                                        @isset($data->profileTeacher->religion)
                                            {{$data->profileTeacher->religion}}
                                        @else
                                            <i>Data Belum ditambahkan</i>
                                        @endif
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>
                                        @isset($data->profileTeacher->address)
                                            {{$data->profileTeacher->address}}
                                        @else
                                            <i>Data Belum ditambahkan</i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>TTL</th>
                                    <td>
                                        @isset($data->profileTeacher->date_of_birth)
                                            {{$data->profileTeacher->place_of_birth}}, {{date('d F Y', strtotime($data->profileTeacher->date_of_birth))}}
                                        @else
                                            <i>Data Belum ditambahkan</i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nomor Hp</th>
                                    <td>
                                        @isset($data->profileTeacher->phone_number)
                                            {{$data->profileTeacher->phone_number}}
                                        @else
                                            <i>Data Belum ditambahkan</i>
                                        @endif
                                    </td>
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
                                <tr>
                                    <th>Jadikan sebagai</th>
                                    <td>
                                        @if (!$user)
                                            <a data-toggle="modal" href="#editAdmin" class="btn btn-sm btn-warning">Admin</a>
                                            <a data-toggle="modal" href="#editOp" class="btn btn-sm btn-primary">Operator 1</a>
                                            <a data-toggle="modal" href="#editOpe" class="btn btn-sm btn-success">Operator 2</a>
                                        @else
                                            @if ($usr->status)
                                                <form action="{{route('teacher.role',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($usr->role_id == 1)
                                                        <a data-toggle="modal" href="#editOp" class="btn btn-sm btn-primary">Operator 1</a>
                                                        <a data-toggle="modal" href="#editOpe" class="btn btn-sm btn-success">Operator 2</a>
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="javascript:return confirm(`Apakah anda yakin ingin menonaktifkan {{$data->name}} dari User?`)" >Nonaktifkan</button>
                                                    @elseif ($usr->role_id == 2)
                                                        <a data-toggle="modal" href="#editAdmin" class="btn btn-sm btn-warning">Admin</a>
                                                        <a data-toggle="modal" href="#editOpe" class="btn btn-sm btn-success">Operator 2</a>
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="javascript:return confirm(`Apakah anda yakin ingin menonaktifkan {{$data->name}} dari User?`)" >Nonaktifkan</button>
                                                    @else
                                                        <a data-toggle="modal" href="#editAdmin" class="btn btn-sm btn-warning">Admin</a>
                                                        <a data-toggle="modal" href="#editOp" class="btn btn-sm btn-primary">Operator 1</a>
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="javascript:return confirm(`Apakah anda yakin ingin menonaktifkan {{$data->name}} dari User?`)" >Nonaktifkan</button>
                                                    @endif
                                                </form>
                                            @else
                                                <a data-toggle="modal" href="#editAdmin" class="btn btn-sm btn-warning">Admin</a>
                                                <a data-toggle="modal" href="#editOp" class="btn btn-sm btn-primary">Operator 1</a>
                                                <a data-toggle="modal" href="#editOpe" class="btn btn-sm btn-success">Operator 2</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @include('pages.teachers.editAdmin')
                        @include('pages.teachers.editOp')
                        @include('pages.teachers.editOpe')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Riwayat Mengajar</h5>
                        <div class="ibox-tools">
                            <ul class="dropdown-menu dropdown-user">
                                <li><a data-toggle="modal" class="dropdown-item" href="#editClass">Ubah data Kelas Guru</a></li>
                            </ul>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Kelas</th>
                                    <th>Mapel</th>
                                    <th>Status</th>
                                </tr>
                                @php
                                    $no     = 1;
                                @endphp
                                @foreach ($history as $h)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$h->school_year->start_year}}/{{$h->school_year->end_year}}</td>
                                        <td>{{$h->classroom->name}}</td>
                                        <td>{{$h->course->name}}</td>
                                        <td>
                                            @if ($h->status)
                                                <span class='label label-success'>Kelas Sekarang</span>
                                            @else
                                                <span class='label label-danger'>Telah Selesai</span>
                                            @endif
                                        </td>
                                        @if ($h->status)
                                            <form action="{{route('teacher.nonCourse',$data->id)}}" method="post">
                                                <td>
                                                    @csrf
                                                    @method('PUT')
                                                    <button id="tombol1" type="submit" class="btn btn-sm btn-danger m-t-n-xs"><i class="fa fa-window-close"></i> Akhiri mapel</button>
                                                </td>
                                            </form>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{route('teacher.nonaktif',$data->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <a href="{{route('teacher.index')}}" class="btn btn-success"><i class="fa fa-chevron-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-danger pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin menonaktifkan {{$data->name}} dari Guru aktif?`)'><i class="fa fa-minus-square"></i> Nonaktifkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('pages.teachers.script')
@endsection
