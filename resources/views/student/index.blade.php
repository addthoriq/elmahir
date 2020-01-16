@extends('student.layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="section">

  <div class="row mb-3">
    <div class="col-md-6">
      <h2 class="section-title">Hai, Selamat Datang!</h2>
      <p class="section-lead">Sistem E-Learning MI Al Wahdah Yogyakarta.</p>
    </div>
    <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
      <button class="btn btn-primary btn-sm">Today {{ date('d M Y') }} <i class="fas fa-calendar-alt"></i></button>
    </div>
  </div>

  <div class="section-body">

    <!-- Mapel Kelas -->
    <div class="row">
      <div class="col-md-10">
        <h5 class="mb-1">Kelas Mapel Anda</h5>
        <p><i class="fas fa-angle-double-right text-primary mr-2"></i>Pilih Kelas Mata Pelajaran anda dan masuk sebagai siswa.</p>
      </div>
      <div class="col-md-2 d-flex align-items-end justify-content-end">
        @if ( count($courses) > 4 )
          <a href="" class="btn btn-sm btn-warning mb-3"><i class="fas fa-clipboard-list"></i> Lihat Semua</a>
        @endif
      </div>
    </div>
    @if ($courses == null)
      <div class="row">
        <div class="col-lg-12">
          <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="fas fa-exclamation"></i></div>
              <div class="alert-body">
                <div class="alert-title">Kosong!</div>
                Anda tidak memiliki Mata Peljaran. Anda bisa menghubungi pengajar anda atau admin.
            </div>
          </div>
        </div>
      </div>
    @endif
    <div class="row">
      @php
        $count1 = count($courses);
        if ($count1 > 4) {
          $count1 = 4;
        }
      @endphp
      @for ($i = 0; $i < $count1; $i++)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12 bg-primary text-white rounded py-2">
                <h5 class="mb-0 text-white"><a href="#" class="text-white">{{ $courses[$i]->list_course }}</a></h5>
                <p class="mb-0">{{ $courses[$i]->classroom }}</p>
              </div>
              <p class="text-secondary mb-0 mt-2">Author</p>
              <h6 class="text-dark">{{ $courses[$i]->user->name }}</h6>
              <a href="" class="btn btn-sm btn-success">
                <i class="fas fa-paperclip"></i> Tugas
              </a>
            </div>
          </div>
        </div>
      @endfor
    </div>

    <!-- List Tugas -->
    <div class="row">
      <div class="col-md-10">
        <h5 class="mb-1">List Tugas</h5>
        <p><i class="fas fa-angle-double-right text-primary mr-2"></i>Kumpulan tugas tugas anda, kerjakan dengan skala prioritas.</p>
      </div>
      <div class="col-md-2 d-flex align-items-end justify-content-end">
        @if ( count($tasks) > 4 )
          <a href="" class="btn btn-sm btn-warning mb-3"><i class="fas fa-clipboard-list"></i> Lihat Semua</a>
        @endif
      </div>
    </div>

    @if ($tasks == null)
      <div class="row">
        <div class="col-lg-12">
          <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="fas fa-exclamation"></i></div>
              <div class="alert-body">
                <div class="alert-title">Kosong!</div>
                Anda tidak memiliki Tugas untuk dikerjakan. Tunggu guru anda memberika tugas.
            </div>
          </div>
        </div>
      </div>
    @endif

    <div class="row">
      @php
        $count2 = count($tasks);
        if ($count2 > 4) {
          $count2 = 4;
        }
      @endphp
      @for ($i = 0; $i < $count2; $i++)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12 bg-primary text-white rounded py-2">
                <h5 class="mb-0 text-white"><a href="#" class="text-white">{{ $tasks[$i]->course->list_course }}</a></h5>
                <p class="mb-0">{{ $tasks[$i]->course->classroom }}</p>
              </div>
              <p class="mt-3 mb-1 font-weight-bold">{{ $tasks[$i]->title }}</p>
              <p class="mb-1 mt-0">
                {!! substr($tasks[$i]->description, 0, 30) !!}
                @if (strlen($tasks[$i]->description) > 29)
                  ...
                @endif
              </p>
              <p class="text-secondary mb-0 mt-2">Author</p>
              <h6 class="text-dark">Budi Santoso, S.Pd</h6>
              <a href="" class="btn btn-sm btn-primary">
                <i class="fas fa-comments"></i> Komentar
              </a>
              <span href="" class="badge badge-success">
                <i class="fas fa-check"></i> Terkumpul
              </span>
            </div>
          </div>
        </div>
      @endfor
    </div>
  </div>
</section>
@endsection
