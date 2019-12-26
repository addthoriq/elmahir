@extends('admin.layouts2.app')

@section('title', 'Data Guru')

@section('style')
    <link rel="stylesheet" href="{{asset('stisla/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('jasny/jasny-bootstrap.min.css') }}">
@endsection

@section('content')

    <section class="section">
        <div class="section-header">
          <h1>Profil Pengajar</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('home.index')}}">Beranda</a></div>
            <div class="breadcrumb-item"><a href="{{route('teacher.index')}}">Daftar Pengajar</a></div>
            <div class="breadcrumb-item">{{$data->name}}</div>
          </div>
        </div>
    </section>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Profil Guru</h5>
                        <div class="card-header-action" style="margin-left: auto">
                            <div class="dropdown">
                              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ubah Profil
                              </button>
                              <div class="dropdown-menu">
                                <a data-toggle="modal" class="dropdown-item has-icon" href="#editAccount"><i class="fa fa-wrench"></i> Ubah Akun</a>
                                <a data-toggle="modal" class="dropdown-item has-icon" href="#editProfile"><i class="fa fa-user"></i> Ubah Profil</a>
                                <a data-toggle="modal" class="dropdown-item has-icon" href="#editAvatar"><i class="fa fa-image"></i> Ubah Poto Profil</a>
                              </div>
                            </div>
                        </div>

                        {{-- Modal disini --}}
                        @include('admin.teachers.editAccount')
                        @include('admin.teachers.editProfile')
                        @include('admin.teachers.editAvatar')

                    </div>

                    <div class="card-body">
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
                                    <span class='label label-success'>Aktif</span>
                                    @if ($data->role_id == 1)
                                        <span class='label label-warning'>Admin</span>
                                    @elseif ($data->role_id == 2)
                                        <span class='label label-primary'>Operator 1</span>
                                    @elseif ($data->role_id == 3)
                                        <span class='label label-success'>Operator 2</span>
                                    @else
                                        <span class='label label-info'>Pengajar</span>
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
                            </tbody>
                        </table>
                        @include('admin.teachers.editAdmin')
                        @include('admin.teachers.editOp')
                        @include('admin.teachers.editOpe')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Riwayat Mengajar</h5>
                    </div>
                    <div class="card-body">
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
                                        <td>{{$h->schoolYear->start_year}}/{{$h->schoolYear->end_year}}</td>
                                        <td>{{$h->classroom}}</td>
                                        <td>{{$h->list_course}}</td>
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
                            <button type="submit" class="btn btn-danger" onclick='javascript:return confirm(`Apakah anda yakin ingin menonaktifkan {{$data->name}} dari Guru aktif?`)'><i class="fa fa-minus-square"></i> Nonaktifkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @include('admin.teachers.script')
@endsection
