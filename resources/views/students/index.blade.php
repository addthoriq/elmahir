@extends('students.layouts.app')

@section('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/fullcalendar/dist/fullcalendar.min.css') }}">
@endsection

@section('content')
<section class="section">
  <div class="section-body">
    <div class="row mb-3">
      <div class="col-md-6">
        <h2 class="section-title">Hai, Selamat Datang!</h2>
        <p class="section-lead">Sistem E-Learning MI Al Wahdah Yogyakarta.</p>
      </div>
      <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
        <button class="btn btn-primary btn-sm">Today {{ date('d M Y') }} <i class="fas fa-calendar-alt"></i></button>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-10">
        <h5 class="mb-1">Kelas Mapel Anda</h5>
        <p><i class="fas fa-angle-double-right text-primary mr-2"></i>Pilih Kelas Mata Pelajaran anda dan masuk sebagai siswa.</p>
      </div>
      <div class="col-md-2 d-flex align-items-end justify-content-end">
        <a href="" class="btn btn-sm btn-warning mb-3"><i class="fas fa-clipboard-list"></i> Lihat Semua</a>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 bg-primary text-white rounded py-2">
              <h5 class="mb-0 text-white"><a href="{{ route('s2.index') }}" class="text-white">Bahasa Indonesia</a></h5>
              <p class="mb-0">XII IPS2</p>
            </div>
            <p class="text-secondary mb-0 mt-2">Author</p>
            <h6 class="text-dark">Budi Santoso, S.Pd</h6>
            <a href="" class="btn btn-sm btn-success">
              <i class="fas fa-paperclip"></i> Tugas
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 bg-primary text-white rounded py-2">
              <h5 class="mb-0 text-white"><a href="{{ route('s2.index') }}" class="text-white">Matematika</a></h5>
              <p class="mb-0">XII IPS2</p>
            </div>
            <p class="text-secondary mb-0 mt-2">Author</p>
            <h6 class="text-dark">Slamet Parwanto, S.Pd</h6>
            <a href="" class="btn btn-sm btn-success">
              <i class="fas fa-paperclip"></i> Tugas
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 bg-primary text-white rounded py-2">
              <h5 class="mb-0 text-white"><a href="{{ route('s2.index') }}" class="text-white">Seni Budaya</a></h5>
              <p class="mb-0">XII IPS2</p>
            </div>
            <p class="text-secondary mb-0 mt-2">Author</p>
            <h6 class="text-dark">Sugiman, S.Pd</h6>
            <a href="" class="btn btn-sm btn-success">
              <i class="fas fa-paperclip"></i> Tugas
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 bg-primary text-white rounded py-2">
              <h5 class="mb-0 text-white"><a href="{{ route('s2.index') }}" class="text-white">Prakarya</a></h5>
              <p class="mb-0">XII IPS2</p>
            </div>
            <p class="text-secondary mb-0 mt-2">Author</p>
            <h6 class="text-dark">Endang Susanti, S.Bud</h6>
            <a href="" class="btn btn-sm btn-success">
              <i class="fas fa-paperclip"></i> Tugas
            </a>
          </div>
        </div>
      </div>
    </div>
  

    <div class="row">
      <div class="col-md-10">
        <h5 class="mb-1">List Tugas</h5>
        <p><i class="fas fa-angle-double-right text-primary mr-2"></i>Kumpulan tugas tugas anda, kerjakan dengan skala prioritas.</p>
      </div>
      <div class="col-md-2 d-flex align-items-end justify-content-end">
        <a href="" class="btn btn-sm btn-warning mb-3"><i class="fas fa-clipboard-list"></i> Lihat Semua</a>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 bg-primary text-white rounded py-2">
              <h5 class="mb-0 text-white"><a href="{{ route('s2.index') }}" class="text-white">Bahasa Indonesia</a></h5>
              <p class="mb-0">XII IPS2</p>
            </div>
            <p class="mb-1 mt-3">Membuat makalah yang sesuai dengan contoh tadi siang...</p>
            <p class="text-secondary mb-0 mt-2">Author</p>
            <h6 class="text-dark">Budi Santoso, S.Pd</h6>
            <a href="" class="btn btn-sm btn-primary">
              <i class="fas fa-comments"></i> Komentar
            </a>
            <a href="" class="btn btn-sm btn-success">
              <i class="fas fa-check"></i> Done
            </a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 bg-primary text-white rounded py-2">
              <h5 class="mb-0 text-white"><a href="{{ route('s2.index') }}" class="text-white">Kimia</a></h5>
              <p class="mb-0">XII IPS2</p>
            </div>
            <p class="mb-1 mt-3">Kerjakan soal pengayaan sebagai penambah nilai harian.</p>
            <p class="text-secondary mb-0 mt-2">Author</p>
            <h6 class="text-dark">Tutik, S.Pd</h6>
            <a href="" class="btn btn-sm btn-primary">
              <i class="fas fa-comments"></i> Komentar
            </a>
            <a href="" class="btn btn-sm btn-danger">
              <i class="fas fa-times"></i> Unsubmit
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection

@section('libraries')
<!-- JS Libraies -->
<script src="{{ asset('stisla/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('stisla/node_modules/fullcalendar/dist/fullcalendar.min.js') }}"></script>
@endsection

@section('specific')
<!-- Page Specific JS File -->
<script src="{{ asset('stisla/assets/js/page/modules-calendar.js') }}"></script>
@endsection