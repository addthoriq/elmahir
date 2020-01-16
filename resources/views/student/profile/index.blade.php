@extends('student.layouts.app')
@section('title', 'Profil')
@section('style')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('stisla/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/assets/css/components.css')}}">
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
                        <div class="profile-widget-item-value">{{$ch->classroom->name}}</div>
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
                         <button class="btn btn-primary" data-toggle="modal" data-target="#edit">Ubah Avatar dan Akun</button>
                     </div>
                 </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>First Name</label>
                        <input type="text" class="form-control" value="Ujang" required="">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Last Name</label>
                        <input type="text" class="form-control" value="Maman" required="">
                        <div class="invalid-feedback">
                          Please fill in the last name
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" value="ujang@maman.com" required="">
                        <div class="invalid-feedback">
                          Please fill in the email
                        </div>
                      </div>
                      <div class="form-group col-md-5 col-12">
                        <label>Phone</label>
                        <input type="tel" class="form-control" value="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Bio</label>
                        <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group mb-0 col-12">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                          <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                          <div class="text-muted form-text">
                            You will get new information about products, offers and promotions
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
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
