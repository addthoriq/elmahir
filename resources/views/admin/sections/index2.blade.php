@extends('admin.layouts2.app')

@section('title', 'Detail Materi')

@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<style>
	.card .card-body .basic-list-group .list-group a {
		transition: none;
	}
	.card .card-body .basic-list-group .list-group .drop-down {
		top: -2rem !important;
	}
</style>
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mt-3 pb-0">
      <div class="col-md-6">
        <h4 class="section-title">Detail Materi</h4>
        <p class="section-lead mt-1"><i class="fas fa-angle-double-right text-primary"></i> Anda bisa melihat, menambah, edit dan hapus materi.</p>
      </div>
      <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Beranda</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Daftar Materi</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
        </ol>
      </div>
    </div>
    <!-- row -->

	<!-- Modal -->
	@include('admin.sections.editModalSection')
	@include('admin.sections.addModalFileSection')

    <div class="container-fluid">
        <div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<div class="card-title mb-0">{{ $section->course->list_course }}</div>
						<div class="d-flex justify-content-center mt-3">
							<img alt="image" class="" src="{{ Storage::url('img/education.jpg') }}" style="height: 400px;">
						</div>
						<h4 class="text-primary mt-4">{{ $section->title }}</h4>
						<p>{{ $section->description }}</p>
						<button data-toggle="modal" data-target="#materiModal" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Ubah</button>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">File Materi</div>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fileModal"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </div>
                        <div class="basic-list-group mt-3">
                            <ul class="list-group list-group-flush">
                            	@if (empty($fileSections[0]))
			                        <p>Tidak ada file untuk materi ini. anda bisa menambahkan file sendiri.</p>
                            	@endif
                            	@foreach ($fileSections as $file)
                            	<li class="list-group-item px-2">
                            		<div class="row">
                            			<div class="col-md-10">
                            				<div class="d-flex flex-column" style="word-wrap: break-word;">
                            					<a href="{{ route('section.detail', $file->id) }}">{{ $file->title }}</a>
                            					<small class="text-secondary">publish : {{ date_format($file->created_at,"d M Y") }}</small>
                            				</div>	
                            			</div>
                            			<div class="col-md-2">                            				
                            				<button class="btn btn-rounded px-3 py-2" style="background-color: transparent;" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                            				<div class="drop-down dropdown-profile dropdown-menu">
                            				    <div class="dropdown-content-body">
                            				        <ul>
                            				            <li>
                            				                <a href="{{ route('section.fileDownload', $file->id) }}"><i class="icon-cloud-download"></i> <span>Download</span></a>
                            				            </li>
                            				            <li>
                            				                <a href="{{ route('section.deleteFileHome', $file->id) }}">
                            				                    <i class="icon-trash"> </i> <span>Hapus</span>
                            				                <a>
                            				            </li>
                            				        </ul>
                            				    </div>
                            				</div>
                            			</div>
                            		</div>
                            	</li>
                            	@endforeach
                            </ul>
                        </div>
					</div>
				</div>
			</div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection

@section('script')
	<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                file: 1,
            },
            methods:{
                addfile(){
                    this.file++;
                },
                delfile(){
                    if (this.file > 1) {
                        this.file--;
                    }
                }
            }
        })
    </script>
@endsection