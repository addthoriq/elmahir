@extends('admin.layouts2.app')
@section('title', 'Data Siswa')
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
                    <li class="breadcrumb-item"><a href="{{route('student.index')}}">Daftar Siswa</a></li>
                    <li class="breadcrumb-item active"><a href="">Data Siswa</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- Modal disini --}}
                        @include('admin.students.editAccount')
                        @include('admin.students.editProfile')
                        @include('admin.students.editAvatar')
                        <div class="card-body">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Ubah Siswa</button>
                                <div class="dropdown-menu">
                                    <a data-toggle="modal" class="dropdown-item" href="#editAccount"><i class="fa fa-wrench"></i> Ubah Akun</a>
                                    <a data-toggle="modal" class="dropdown-item" href="#editProfile"><i class="fa fa-user"></i> Ubah Profil</a>
                                    <a data-toggle="modal" class="dropdown-item" href="#editAvatar"><i class="fas fa-image"></i> Ubah Poto Profil</a>                                </div>
                            </div>
                            @if (session('notif'))
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{session('notif')}}
                                </div>
                            @endif
                            <div class="text-center mb-3">
                                @if ($data->avatar)
                                    <img alt="image" class="rounded-circle" src="{{Storage::url($data->avatar)}}" width="100px" height="100px">
                                @else
                                    <img alt="image" class="rounded-circle" src="{{Avatar::create($data->name)->toBase64()}}">
                                @endif
                                <h4 class="my-3">{{$data->name}}</h4>
                                @if($data->status)
                                    <span class='label label-pill label-success text-white'>Aktif</span>
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
                                                    <span class='label label-pill label-primary'>Laki-Laki</span>
                                                @else
                                                    <span class='label label-pill label-danger'>Perempuan</span>
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
                            <div class="table-responsive">
                                <h5>Riwayat Kelas</h5>
                                <table class="table header-border">
                                    <tbody>
                                        <tbody>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelas</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Status</th>
                                            </tr>
                                            @php
                                                $no     = 1;
                                            @endphp
                                            @foreach ($history as $h)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$h->classroom->name}}</td>
                                                    <td>{{$h->school_year->start_year}}/{{$h->school_year->end_year}}</td>
                                                    <td>
                                                        @if ($h->status)
                                                            <span class='label label-pill label-success'>Kelas Saat ini</span>
                                                        @else
                                                            <span class='label label-pill label-danger'>Selesai</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </tbody>
                                </table>
                                <form action="{{route('student.alumni',$data->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <a href="{{route('student.index')}}" class="btn btn-sm btn-light"><i class="fa fa-chevron-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-danger pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin meluluskan {{$data->name}} ?`)'><i class="fa fa-graduation-cap"></i> Lulus</button>
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
    @include('admin.students.script')
@endsection
