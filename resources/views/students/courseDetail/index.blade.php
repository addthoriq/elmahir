@extends('students.layouts.app')

@section('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
@endsection

@section('content')
<div class="container">
<section class="section mt-4">

  <div class="section-body">
    <div class="row">
    	<div class="col-12 mb-4">
    	  <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="{{ asset('stisla/assets/img/unsplash/andre-benz-1214056-unsplash.jpg') }}">
    	    <div class="hero-inner">
    	      <h1 class="mb-0">Bahasa Indonesia</h1>
    	      <p class="">Budi Santoso, S.Pd.</p>
    	    </div>
    	  </div>
    	</div>
    </div>
  </div>
</section>
</div>
@endsection

@section('script')
<!-- JS Libraies -->
  <script src="{{ asset('stisla/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
@endsection