@extends('student.layouts.app')
@section('title', 'Profil')
@section('style')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('stisla/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />
    <link href="{{asset('jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <style media="screen">
        .fileinput-preview.fileinput-exists.img-thumbnail img{
            max-width: 100%;
        }
    </style>
@endsection
@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{route('s1.index')}}">Beranda</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-sm-4">

          <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
              @if (auth()->check())
                  @if(auth()->user()->avatar)
                      <img src="{{Storage::url(auth()->user()->avatar)}}" class="rounded-circle profile-widget-picture">
                  @else
                      <img src="{{Avatar::create(auth()->user()->name)->toBase64()}}" class="rounded-circle profile-widget-picture">
                  @endif
              @endif
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Kelas</div>
                        <div class="profile-widget-item-value">{{$c->classroom->name}}</div>
                    </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">
                    {{Auth::user()->name}}
                    @if (Auth::user()->gender == 'L')
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>
                             Laki-Laki
                         </div>
                    @else
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>
                             Perempuan
                         </div>
                    @endif
                 </div>
                 <div class="row">
                   <div class="form-group col-md-12 col-12">
                     <label>Nomor Induk Siswa Nasional (NISN)</label>
                     <input type="text" class="form-control" value="{{Auth::user()->nisn}}" readonly>
                   </div>
                 </div>
                 <div class="row">
                   <div class="form-group col-md-12 col-12">
                     <label>Email</label>
                     <input type="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                   </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 col-12">
                         <button class="btn btn-primary float-right" data-toggle="modal" data-target="#edit"><i class="fas fa-wrench"></i> Ubah Avatar dan Akun</button>
                     </div>
                 </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form method="post" class="needs-validation" action="{{route('spr.profile')}}">
                  @csrf
                  @method('PUT')
                <div class="card-header">
                  <h4>Informasi Pribadi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                    @isset($data->profileStudent->nik)
                        <div class="form-group col-md-6 col-12">
                            <label id="labelNik" for="nik">Nomor Induk Kependudukan (NIK)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-address-card"></i></span></div>
                                <input required readonly id="nik" type="text" maxlength="16" value="{{isset($data->profileStudent->nik)?$data->profileStudent->nik:''}}" name="nik" class="form-control">
                            </div>
                            <i id="noticeNik"></i>
                        </div>
                    @endisset
                @empty ($data->profileStudent->nik)
                        <div class="form-group col-md-6 col-12">
                            <label id="labelNip" for="nik">Nomor Induk Kependudukan (NIK)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-address-card"></i></span></div>
                                <input required id="nik" type="text" maxlength="16" value="{{isset($data->profileStudent->nik)?$data->profileStudent->nik:''}}" name="nik" class="form-control">
                            </div>
                            <i id="noticeNik"></i>
                        </div>
                    @endempty
                    <div class="form-group col-md-6 col-12">
                        <label id="labelReligion">Agama </label>
                        <select id="religion" class="form-control m-b" name="religion">
                            <option selected value="{{isset($data->profileStudent->religion)?$data->profileStudent->religion:''}}">-- {{isset($data->profileStudent->religion)?$data->profileStudent->religion:'Pilih Agama'}} --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label id="labelTtl" for="ttl">Tempat Lahir</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-thumbtack"></i></span></div>
                                <input id="ttl" type="text" value="{{isset($data->profileStudent->place_of_birth)?$data->profileStudent->place_of_birth:''}}" name="place_of_birth" class="form-control">
                            </div>
                            <i id="noticeTtl"></i>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label id="labelDate" class="font-normal">Tanggal Lahir</label>
                            <div class="input-group">
                                <span class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></span>
                                <input type="text" class="form-control datepicker" maxlength="10" id="datepicker" value="{{isset($data->profileStudent->date_of_birth)?$data->profileStudent->date_of_birth:''}}" placeholder="20-05-2000" name="date_of_birth">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label id="labelAddress" for="address">Alamat</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                                <input required id="address" type="text" value="{{isset($data->profileStudent->address)?$data->profileStudent->address:''}}" name="address" class="form-control">
                            </div>
                            <i id="noticeAddress"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label id="labelPhone" for="phone">Nomor Hp</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                <input required id="phone" type="number" maxlength="12" value="{{isset($data->profileStudent->phone_number)?$data->profileStudent->phone_number:''}}" name="phone_number" class="form-control">
                            </div>
                            <i id="noticePhone"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <button class="btn btn-primary float-right" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Kelas</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no     = 1;
                            @endphp
                            @foreach ($ch as $h)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$h->classroom->name}}</td>
                                    <td>{{$h->school_year->start_year}}/{{$h->school_year->end_year}}</td>
                                    <td>
                                        @if ($h->status)
                                            <span class='badge badge-success'>Kelas Saat ini</span>
                                        @else
                                            <span class='badge badge-danger'>Selesai</span>
                                        @endif
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
    </section>
    @include('student.profile.edit')
@endsection
@section('script')
    @include('student.profile.script')
@endsection
