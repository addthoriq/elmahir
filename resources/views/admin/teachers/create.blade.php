@extends('admin.layouts2.app')
@section('title', 'Tambah User')
@section('style')
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
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Daftar User</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('teacher.create')}}">Tambah User</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <form id="form" action="{{route('teacher.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Informasi Dasar & Pengaturan Akun</h4>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label id="labelNip" for="nip">Nomor Induk Pegawai (NIP)</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                </div>
                                                <input required id="nip" name="nip" autocomplete="off" type="text" maxlength="16" class="form-control">
                                            </div>
                                            <span id="noticeNip"></span>
                                        </div>
                                        <div class="form-group">
                                            <label id="labelName" for="name">Nama</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input required id="name" name="name" type="text" class="form-control">
                                            </div>
                                            <span id="noticeName"></span>
                                        </div>
                                        <div class="form-group">
                                            <label id="labelSYear">Tahun Masuk</label>
                                            <input required id="start_year" maxlength="4" name="start_year" type="text" maxlength="4" class="form-control">
                                            <span id="noticeSYear"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="input-group mb-3">
                                                <label class="radio-inline mr-3">
                                                    <input required type="radio" value="L" name="gender">
                                                    Laki-Laki
                                                </label>
                                                <label class="radio-inline mr-3">
                                                    <input required type="radio" value="P" name="gender">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label id="labelEmail" for="email">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-at"></i></span>
                                                </div>
                                                <input required id="email" autocomplete="off" name="email" type="text" class="form-control">
                                            </div>
                                            <span id="noticeEmail"></span>
                                        </div>
                                        <div class="form-group">
                                            <label id="labelPassword" for="password" for="password">Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                </div>
                                                <input required id="password" name="password" type="password" class="form-control">
                                            </div>
                                            <span id="noticePassword"></span>
                                        </div>
                                        <div class="form-group">
                                            <label id="labelCPassword" for="confirmation_password" for="confirmation_password">Konfirmasi Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                </div>
                                                <input required id="confirmation_password" name="confirmation_password" type="password" class="form-control">
                                            </div>
                                            <span id="noticeCPassword"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto Profil</label>
                                            <div class="custom-file">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                  <div class="fileinput-new img-thumbnail" style="height: 160px;">
                                                    <img src="{{asset('img/150.png')}}">
                                                  </div>
                                                  <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                                  <div>
                                                    <span class="btn btn-outline-secondary btn-file">
                                                        <span class="fileinput-new">Pilih Gambar</span>
                                                        <span class="fileinput-exists">Ubah</span>
                                                        <input required accept="image/*" type="file" name="avatar">
                                                    </span>
                                                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-12">
                                        <button class="btn btn-primary pull-right" type="submit">Tambah <i class="fa fa-send"></i></button>
                                        <a href="{{route('teacher.index')}}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <button class="btn btn-danger" type="reset"><i class="fas fa-trash"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
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
                    $('#labelNip').addClass('text-danger').text('Nomor Induk Pegawai (NIP) *');
                    $('#noticeNip').addClass('text-danger').text('Nomor Induk Pegawai (NIP) tidak boleh kosong');
                }else {
                    $('#labelNip').removeClass('text-danger').text('Nomor Induk Pegawai (NIP)');
                    $('#noticeNip').removeClass('text-danger').text('');
                }
            });
            $('#name').blur(function(){
                var name     = $('#name').val();
                if (name == "") {
                    $('#labelName').addClass('text-danger').text('Nama *');
                    $('#noticeName').addClass('text-danger').text('Nama tidak boleh kosong');
                }else if (name.length < 4 || name.length > 100) {
                    $('#labelName').addClass('text-danger').text('Nama *');
                    $('#noticeName').addClass('text-danger').text('Nama minimal 4 dan maksimal 100 karakter');
                }else {
                    $('#labelName').removeClass('text-danger').text('Nama');
                    $('#noticeName').removeClass('text-danger').text('');
                }
            })
            $("#start_year").blur(function(){
                var start_year = $("#start_year").val();
                if (start_year == "") {
                    $("#labelSYear").addClass('text-danger').text('Tahun Masuk *');
                    $('#noticeSYear').addClass('text-danger').text('Tahun Masuk tidak boleh kosong');
                }else{
                    $("#labelSYear").removeClass('text-danger').text('Tahun Masuk');
                    $('#noticeSYear').removeClass('text-danger').text('');
                }
            })
            $("#email").blur(function(){
              var email   = $("#email").val();
              if (email == "") {
                  var pesan   = "Email tidak boleh kosong";
                  $("#labelEmail").addClass('text-danger').text('Email *');
                  $("#noticeEmail").addClass('text-danger').text(pesan);
              }
              else if (email.search('@')>=0) {
                var pesan2   = "Email Terverifikasi";
                $("#labelEmail").remmoveClass('text-danger').text('Email *');
                $("#email").remmoveClass('danger');
                $("#noticeEmail").text(pesan2);
              }else {
                var pesan3   = "Email harus sesuai standar";
                $("#labelEmail").addClass('text-danger').text('Email *');
                $("#noticeEmail").text(pesan3);
              }
            })
            $("#password").blur(function(){
              var passNew   = $("#password").val();
              var passwordKonfir  = $("#confirmation_password").val();
              if (passNew == "" && passwordKonfir == "") {
                  $(".text-muted").remove();
                  $("#labelPassword").addClass('text-danger').text('Password *');
                  $("#noticePassword").addClass('text-danger').text("Password tidak boleh kosong");
                  $("#password").addClass('danger');

              }else if (passNew.length < 8) {
                $(".text-muted").remove();
                $("#labelPassword").addClass('text-danger').text('Password *');
                $("#noticePassword").addClass('text-danger').text("Password kurang 8 Karakter");
              }else {
                $(".text-muted").remove();
                $("#labelPassword").removeClass('text-danger').text('Password');
                $("#noticePassword").removeClass('text-danger').text("");
              }
            })
            $("#confirmation_password").blur(function(){
              var passNew     = $("#password").val();
              var passKonfir  = $("#confirmation_password").val();
              if (passNew == "" && passKonfir == "") {
                  $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
                  $("#noticeCPassword").addClass('text-danger').text('Password tidak boleh kosong');
                  $(".text-muted").text("Password minimal 8 karakter");
              }else if (passKonfir !== passNew) {
                $(".text-muted").remove();
                $("#password").addClass('danger');
                $("#labelPassword").addClass('text-danger').text('Password *');
                $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
                $("#noticeCPassword").addClass('text-danger').text("Password tidak sama");
              }else if (noticeCPassword.length < 8) {
                $(".text-muted").remove();
                $("#labelCPassword").addClass('text-danger').text('Konfirmasi Password *');
                $("#noticeCPassword").addClass('text-danger').text("Lengkapi Password anda");
              }else {
                $(".text-muted").remove();
                $("#labelCPassword").removeClass('text-danger').text('Konfirmasi Password');
                $("#noticeCPassword").removeClass('text-danger').text("Password benar");
              }
            })
       });
    </script>
@endsection
