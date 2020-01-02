@extends('admin.layouts2.app')
@section('title', 'Data Pengajar')
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
                    <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Daftar Pengajar</a></li>
                    <li class="breadcrumb-item active"><a href="">Detail Pengajar</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- Modal disini --}}
                        @include('admin.teachers.editAccount')
                        @include('admin.teachers.editProfile')
                        @include('admin.teachers.editAvatar')
                        <div class="card-body">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Ubah Pengajar</button>
                                <div class="dropdown-menu">
                                    <a data-toggle="modal" class="dropdown-item" href="#editAccount"><i class="fa fa-wrench"></i> Ubah Akun</a>
                                    <a data-toggle="modal" class="dropdown-item" href="#editProfile"><i class="fa fa-user"></i> Ubah Profil</a>
                                    <a data-toggle="modal" class="dropdown-item" href="#editAvatar"><i class="fas fa-image"></i> Ubah Poto Profil</a>
                                </div>
                            </div>
                            @if (session('notif'))
                                <div class="alert alert-success alert-dismissable">
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
                                @if($data->status)
                                    <span class='label label-pill label-success'>Aktif</span>
                                    @if ($data->role_id == 1)
                                        <span class='label label-pill label-warning'>Admin</span>
                                    @elseif ($data->role_id == 2)
                                        <span class='label label-pill label-info'>Operator 1</span>
                                    @elseif ($data->role_id == 3)
                                        <span class='label label-pill label-success'>Operator 2</span>
                                    @elseif ($data->role_id == 4)
                                        <span class='label label-pill label-primary'>Pengajar</span>
                                    @else
                                        <span class='label label-pill label-light'>Pegawai</span>
                                    @endif
                                @else
                                    <span class='label label-pill label-danger'>Pengajar tidak Aktif</span>
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
                                                    <span class='label label-pill label-primary'>Laki-Laki</span>
                                                @else
                                                    <span class='label label-pill label-danger'>Perempuan</span>
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
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <h5>Riwayat Mengajar</h5>
                                <table class="table header-border">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Kelas</th>
                                            <th>Mapel</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                        @php
                                            $no     = 1;
                                        @endphp
                                        @foreach ($history as $h)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$h->schoolYear->start_year}}/{{$h->schoolYear->end_year}}</td>
                                                <td>{{$h->classroom}}</td>
                                                <td>{{$h->list_course}}</td>
                                                <td>
                                                    @if ($h->status)
                                                        <span class='label label-pill label-success'>Aktif</span>
                                                    @else
                                                        <span class='label label-pill label-danger'>Selesai</span>
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
                                    <a href="{{route('teacher.index')}}" class="btn btn-sm btn-light"><i class="fa fa-chevron-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-danger pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin menonaktifkan {{$data->name}} dari Guru aktif?`)'><i class="fa fa-minus-square"></i> Nonaktifkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.teachers.script')
@endsection
