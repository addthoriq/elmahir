@extends('admin.layouts2.app')

@section('title', 'Detail Materi')

@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<!-- Custom Stylesheet -->
<link href="{{ asset('qlab/plugins/summernote/dist/summernote.css') }}" rel="stylesheet">
<style>
	.card .card-body .basic-list-group .list-group a {
		transition: none;
	}
    .card .card-body .basic-list-group .list-group .onlamp .acv a {
        color: #7571f9;
        font-weight: bold;
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
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Daftar Materi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </div>
    <!-- row -->

    <!-- Modal -->
    @include('admin.tasks.modalEditTask')
    @include('admin.tasks.modalAddFileTask')

    <div class="container-fluid">
        <div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-8">
                                <div class="card-title mb-2">{{ $task->course->list_course }} - {{ $task->title }}</div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <button class="btn btn-rounded" style="background-color: transparent;" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="drop-down dropdown-profile dropdown-menu pb-0">
                                    <div class="dropdown-content-body pb-0">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#taskModal">
                                                    <i class="far fa-edit"></i> <span>Edit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-trash"> </i> <span>Hapus</span>
                                                <a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{Avatar::create($task->course->user->name)->toBase64()}}" height="20" width="20" class="mr-1">
                            <b class="mr-4">{{ $task->course->user->name }}</b>
                            {{ date_format($task->created_at,"d M Y") }} 
                            {{ $task->updated_at ? "(Diedit ".date_format($task->updated_at,"d M Y").")" : ""  }}
                        </div>
						<div class="d-flex justify-content-center mt-3">
                            @if (empty($files->link))
                                @if (stripos($files->type_file, 'image') !== FALSE)
                                    <img alt="image" class="img-fluid" src="{{ Storage::url($files->name_file) }}">
                                @else
                                    <embed src="{{ Storage::url($files->name_file) }}" type="application/pdf" width="100%" height="400px" />
                                @endif
                            @else
                                <iframe width="560" height="315" src="{{ $files->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
						</div>
						<p>{!! $task->description !!}</p>

                        <p class="mt-5 mb-1">0 Komentar</p>
                        <form action="">
                            <div class="row border-top pt-3 mt-0 d-flex align-items-center">
                                <div class="col-md-1">
                                    <img src="{{Avatar::create($task->course->user->name)->toBase64()}}" height="40" width="40">
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Komentar anda...">
                                </div>
                                <div class="col-md-2">
                                    <button href="#" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-3">Assesment Siswa</div>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-center flex-column border-right">
                                <h3>{{ count($classHistory) }}</h3>
                                <p class="mb-2">Ditugaskan</p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center flex-column border-left">
                                <h3>{{ count($answerTask) }}</h3>
                                <p class="mb-2">Diserahkan</p>
                            </div>
                        </div>
                        <a href="{{ route('answertask.home', $task->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Selengkapnya</a>
                    </div>
                </div>
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">File Materi</div>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fileModal"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </div>
                        <div class="basic-list-group mt-3">
                            <ul class="list-group list-group-flush">
                                @if (empty($fileTasks[0]))
                                    <p>Tidak ada file untuk materi ini. anda bisa menambahkan file sendiri.</p>
                                @endif
                                @foreach ($fileTasks as $file)
                                <li class="list-group-item px-2 {{ Request::url() == route('task.detail', $file->id) ? 'onlamp' : '' }}">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="d-flex flex-column acv" style="word-wrap: break-word;">
                                                <a href="{{ route('task.detail', $file->id) }}">{{ $file->title }}</a>
                                                <small class="text-secondary">publish : {{ date_format($file->created_at,"d M Y") }}</small>
                                            </div>  
                                        </div>
                                        <div class="col-md-2">                                          
                                            <button class="btn btn-rounded px-3 py-2" style="background-color: transparent;" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                            <div class="drop-down dropdown-profile dropdown-menu">
                                                <div class="dropdown-content-body">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('task.fileDownload', $file->id) }}"><i class="icon-cloud-download"></i> <span>Download</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('task.deleteFile', $file->id) }}">
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
    <script src="{{ asset('qlab/plugins/summernote/dist/summernote.min.js') }}"></script>
    <script src="{{ asset('qlab/plugins/summernote/dist/summernote-init.js') }}"></script>
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