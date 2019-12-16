@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('style')
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Siswa</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home.index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('student.index') }}">Data Siswa</a>
                </li>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Detail Siswa</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Profil Siswa</h5>
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
                        @include('pages.students.editAccount')
                        @include('pages.students.editProfile')
                        @include('pages.students.editAvatar')


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
                                @if($data->status)
                                    <span class='label label-success'>Siswa</span>
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
                                    <th>NISN</th>
                                    <td>{{$data->nisn}}</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td>
                                        @isset($data->profileStudent->nik)
                                            {{$data->profileStudent->nik}}
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
                                        @isset($data->profileStudent->religion)
                                            {{$data->profileStudent->religion}}
                                        @else
                                            <i>Data Belum ditambahkan</i>
                                        @endif
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>
                                        @isset($data->profileStudent->address)
                                            {{$data->profileStudent->address}}
                                        @else
                                            <i>Data Belum ditambahkan</i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>TTL</th>
                                    <td>
                                        @isset($data->profileStudent->date_of_birth)
                                            {{$data->profileStudent->place_of_birth}}, {{date('d F Y', strtotime($data->profileStudent->date_of_birth))}}
                                        @else
                                            <i>Data Belum ditambahkan</i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nomor Hp</th>
                                    <td>
                                        @isset($data->profileStudent->phone_number)
                                            {{$data->profileStudent->phone_number}}
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Riwayat Kelas</h5>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a data-toggle="modal" class="dropdown-item" href="#editClass">Ubah data Kelas Siswa</a></li>
                            </ul>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>

                        {{-- Modal disini --}}
                        @include('pages.students.editClass')

                    </div>

                    <div class="ibox-content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Kelas</th>
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
                                        <td>
                                            @if ($h->status)
                                                <span class='label label-success'>Kelas Sekarang</span>
                                            @else
                                                <span class='label label-danger'>Telah Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{route('student.alumni',$data->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <a href="{{route('student.index')}}" class="btn btn-success"><i class="fa fa-chevron-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-danger pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin menjadikan siswa ini alumni?`)'><i class="fa fa-graduation-cap"></i> Jadikan Alumni</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('pages.students.script')
@endsection
