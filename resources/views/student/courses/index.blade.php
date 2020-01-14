@extends('student.layouts.app')

@section('title', 'Materi')

@section('style')
<style>
  .bg-grey {
    /*background-image: linear-gradient(-45deg, #3d3d3d, #1e1e1e);*/
    background-image: linear-gradient(-45deg, #007bff, #0846aa);
  }
  .card .card-body .nav .nav-link:hover {
    background-color: #eaeaea;
  }
  .card .card-body .btn-hover button:hover {
    background-color: #eaeaea;
  }
</style>
@endsection

@section('content')
<section class="section">

  <div class="section-body">
    <div class="row d-flex justify-content-center">
      <div class="col-12">
        <div class="hero bg-grey text-white pt-3 pb-4" >
          <div class="hero-inner">
            <div class="d-flex justify-content-end"><span><i class="fas fa-cogs"></i></span></div>
            <h1 class="mb-0">Seni Budaya</h1>
            <div class="row d-flex justify-content-center align-items-center mt-0 pt-0">
              <div class="col-md-6">
                <p class="lead">XI IPS 1 - Pengajar : Samiah Suryatmi</p>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <span class="badge badge-primary">Today {{ date('d M Y') }}  <i class="fas fa-calendar-alt"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            @include('student.courses.sidebar')
          </div>
        </div>
      </div>
      @yield('list')
    </div>
  </div>
</section>
@endsection