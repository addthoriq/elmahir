@extends('student.layouts.app')

@section('title', 'Tugas')

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

  </div>
</section>
@endsection