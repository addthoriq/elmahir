@extends('admin.layouts2.app')

@section('title', 'Tambah Pengajar')

@section('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jasny/jasny-bootstrap.min.css') }}">
@endsection

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Tambah Pengajar</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{route('home.index')}}">Beranda</a></div>
          <div class="breadcrumb-item"><a href="{{route('teacher.index')}}">Daftar Pengajar</a></div>
          <div class="breadcrumb-item">Tambah Pengajar</div>
        </div>
      </div>

      <div class="section-body">
          <form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <h4>Informasi Dasar</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label id="labelNip" for="nip">Nomor Induk Pengajar (NIP)</label>
                          <div class="input-group" style="border: 1px red;">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-id-card"></i>
                              </div>
                            </div>
                            <input required maxlength="16" type="text" name="nip" id="nip" class="form-control">
                          </div>
                          <span id="noticeNip"></span>
                          @if ($errors->has('nip'))
                              <span class="text-danger">{{$errors->first('nip')}}</span>
                          @endif
                        </div>
                        <div class="form-group">
                          <label id="labelName" for="name">Nama Pengajar</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <input required type="text" name="name" id="name" class="form-control">
                          </div>
                          <span id="noticeName"></span>
                          @if ($errors->has('name'))
                              <span class="text-danger">{{$errors->first('name')}}</span>
                          @endif
                        </div>
                        <div class="form-group">
                          <label id="labelSYear" for="start_year">Tahun Masuk</label>
                          <input required maxlength="4" type="text" name="start_year" id="start_year" class="form-control">
                          <span id="noticeSYear"></span>
                          @if ($errors->has('start_year'))
                              <span class="text-danger">{{$errors->first('start_year')}}</span>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="form-label">Jenis Kelamin</label>
                          <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                              <input required type="radio" name="gender" value="L" class="selectgroup-input">
                              <span class="selectgroup-button">Laki-laki</span>
                            </label>
                            <label class="selectgroup-item">
                              <input required type="radio" name="gender" value="P" class="selectgroup-input">
                              <span class="selectgroup-button">Perempuan</span>
                            </label>
                          </div>
                          @if ($errors->has('gender'))
                              <span class="text-danger">{{$errors->first('gender')}}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <h4>Pengaturan Akun</h4>
                      </div>
                      <div class="card-body">
                          <div class="form-group">
                            <label id="labelEmail" for="email">Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-at"></i>
                                </div>
                              </div>
                              <input required type="email" name="email" id="email" class="form-control">
                            </div>
                            <span id="noticeEmail"></span>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label id="labelPassword" for="password">Password</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-lock"></i>
                                </div>
                              </div>
                              <input required type="password" name="password" id="password" class="form-control">
                            </div>
                            <span id="noticePassword"></span>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label id="labelCPassword" for="confirmation_password">Konfirmasi Password</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-lock"></i>
                                </div>
                              </div>
                              <input required type="password" name="confirmation_password" id="confirmation_password" class="form-control">
                            </div>
                            <span id="noticeCPassword"></span>
                            @if ($errors->has('confirmation_password'))
                                <span class="text-danger">{{$errors->first('confirmation_password')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                              <label>Poto Profil</label>
                              <div class="custom-file">
                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="height: 160px;">
                                      <img src="{{ asset('img/150.png') }}">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                    <div>
                                      <span class="btn btn-outline-secondary btn-file">
                                          <span class="fileinput-new">Pilih Gambar</span>
                                          <span class="fileinput-exists">Ubah</span>
                                          <input type="file" name="avatar">
                                      </span>
                                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12 col-md-12 col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              <a href="{{route('teacher.index')}}" class="btn btn-icon .icon-left btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                              <button type="reset" class="btn btn-icon .icon-left btn-danger"><i class="fa fa-trash"></i> Reset</button>
                              <button type="submit" class="btn btn-icon .icon-left btn-primary"><i class="fa fa-save"></i> Kirim</button>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
      </div>
    </section>
@endsection

@section('script')
    <!-- Jasny -->
    <script src="{{asset('jasny/jasny-bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
            $('#nip').bind('keypress', function(e){
                var keyCode = e.which ? e.which : e.keyCode;
                if (!(keyCode >= 48 && keyCode <= 57)) {
                    return false;
                }else {
                    return true;
                }
            });
            $('#start_year').bind('keypress',function(e){
                var keyCode = e.which ? e.which : e.keyCode;
                if (!(keyCode >= 48 && keyCode <= 57)) {
                    return false;
                }else {
                    return true;
                }
            });
            $('#nip').blur(function(){
                var nip     = $('#nip').val();
                if (nip == "") {
                    $('#labelNip').addClass('text-danger').text('Nomor Induk Pengajar (NIP) *');
                    $('#nip').addClass('border border-danger');
                    $('#noticeNip').addClass('text-danger').text('Nomor Induk Pengajar (NIP) tidak boleh kosong');
                    document.getElementById('tombol').disabled = true;
                }else {
                    $('#labelNip').removeClass('text-danger').text('Nomor Induk Pengajar (NIP)');
                    $('#nip').removeClass('border border-danger');
                    $('#noticeNip').removeClass('text-danger').text('');
                    document.getElementById('tombol').disabled = false;
                }
            });
            $('#name').blur(function(){
                var name     = $('#name').val();
                if (name == "") {
                    $('#labelName').addClass('text-danger').text('Nama Pengajar *');
                    $('#name').addClass('border border-danger');
                    $('#noticeName').addClass('text-danger').text('Nama Pengajar tidak boleh kosong');
                    document.getElementById('tombol').disabled = true;
                }else if (name.length < 4 || name.length > 100) {
                    $('#labelName').addClass('text-danger').text('Nama Pengajar *');
                    $('#name').addClass('border border-danger');
                    $('#noticeName').addClass('text-danger').text('Nama Pengajar minimal 4 dan maksimal 100 karakter');
                    document.getElementById('tombol').disabled = true;
                }else {
                    $('#labelName').removeClass('text-danger').text('Nama Pengajar');
                    $('#name').removeClass('border border-danger');
                    $('#noticeName').removeClass('text-danger').text('');
                    document.getElementById('tombol').disabled = false;
                }
            })
            $("#start_year").blur(function(){
                var start_year = $("#start_year").val();
                if (start_year == "") {
                    $("#labelSYear").addClass('text-danger').text('Tahun Masuk *');
                    $('#start_year').addClass('border border-danger');
                    $('#noticeSYear').addClass('text-danger').text('Tahun Masuk tidak boleh kosong');
                    document.getElementById('tombol').disabled = true;
                }else{
                    $("#labelSYear").removeClass('text-danger').text('Tahun Masuk');
                    $('#start_year').removeClass('border border-danger');
                    $('#noticeSYear').removeClass('text-danger').text('');
                    document.getElementById('tombol').disabled = false;
                }
            })
            $("#email").blur(function(){
              var email   = $("#email").val();
              if (email == "") {
                  var pesan   = "Email tidak boleh kosong";
                  $("#labelEmail").addClass('text-danger').text('Email');
                  $("#email").addClass('border border-danger');
                  $("#noticeEmail").addClass('text-danger').text(pesan);
                  document.getElementById("tombol").disabled = true;
              }
              else if (email.search('@')>=0) {
                var pesan2   = "Email Terverifikasi";
                $("#labelEmail").remmoveClass('text-danger').text('Email');
                $("#email").remmoveClass('border border-danger');
                $("#noticeEmail").text(pesan2);
                document.getElementById("tombol").disabled = true;
              }else {
                var pesan3   = "Email harus sesuai standar";
                $("#labelEmail").addClass('text-danger').text('Email *');
                $("#email").addClass('border border-danger');
                $("#noticeEmail").text(pesan3);
                document.getElementById("tombol").disabled = false;
              }
            })
            $("#password").blur(function(){
              var passNew   = $("#password").val();
              var noticeCPassword  = $("#confirmation_password").val();
              if (passNew == "" && noticeCPassword == "") {
                  $(".text-muted").remove();
                  $("#noticePassword").addClass('text-danger').text("Password tidak boleh kosong");
                  $("#labelPassword").addClass('text-danger').text('Password *');
                  $("#password").addClass('border border-danger');
                  document.getElementById("tombol").disabled = true;
              }else if (passNew.length < 8) {
                $(".text-muted").remove();
                $("#labelPassword").addClass('text-danger').text('Password *');
                $("#password").addClass('border border-danger');
                $("#noticePassword").addClass('text-danger').text("Password kurang 8 Karakter");
                document.getElementById("tombol").disabled = true;
              }else {
                $(".text-muted").remove();
                $("#labelPassword").removeClass('text-danger').text('Password');
                $("#password").removeClass('border border-danger');
                $("#noticePassword").removeClass('text-danger').text("");
                document.getElementById("tombol").disabled = false;
              }
            })
            $("#confirmation_password").blur(function(){
              var passNew     = $("#password").val();
              var noticeCPassword  = $("#confirmation_password").val();
              if (passNew == "" && noticeCPassword == "") {
                  $("#noticeCPassword").addClass('text-danger').text('Password tidak boleh kosong');
                  $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
                  $("#confirmation_password").addClass('border border-danger');
                  $(".text-muted").text("Password minimal 8 karakter");
                  document.getElementById("tombol").disabled = true;
              }else if (noticeCPassword !== passNew) {
                $(".text-muted").remove();
                $("#password").addClass('border border-danger');
                $("#labelPassword").addClass('text-danger').text('Password *');
                $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
                $("#confirmation_password").addClass('border border-danger');
                $("#noticeCPassword").addClass('text-danger').text("Password tidak sama");
                document.getElementById("tombol").disabled = true;
              }else if (noticeCPassword.length < 8) {
                $(".text-muted").remove();
                $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
                $("#confirmation_password").addClass('border border-danger');
                $("#noticeCPassword").addClass('text-danger').text("Lengkapi Password anda");
                document.getElementById("tombol").disabled = true;
              }else {
                $(".text-muted").remove();
                $("#labelCPassword").removeClass('text-danger').text('Konfirmasi Password');
                $("#confirmation_password").removeClass('border border-danger');
                $("#noticeCPassword").removeClass('text-danger').text("Password benar");
                document.getElementById("tombol").disabled = false;
              }
            })
       });
    </script>
@endsection
