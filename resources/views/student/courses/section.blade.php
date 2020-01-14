@extends('student.courses.index')

@section('list')
<div class="col-md-9">
  @foreach ($sections as $section)
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-md-1 pr-0">
            <img alt="image" src="{{ Avatar::create($section->course->user->name)->toBase64() }}" class="rounded-circle mr-1" width="40px">
          </div>
          <div class="col-md-9 d-flex flex-column justify-content-start pl-0">
            <h6 class="mb-0">{{ $section->course->user->name }}</h6>
            <span>{{ date_format($section->created_at, 'd M Y') }}</span>
          </div>
          <div class="col-md-1 d-flex justify-content-end align-items-center">
            <span class="badge badge-primary">Materi</span>
          </div>
          <div class="col-md-1 d-flex justify-content-end align-items-center">
            <i class="fas fa-ellipsis-v"></i>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-12">
            <p class="mb-0">{{ $section->title }} <a href="#">Lihat selengkapnya</a></p>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  
  <div class="row d-flex justify-content-end">
    <div class="col-md-4">
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

</div>
@endsection