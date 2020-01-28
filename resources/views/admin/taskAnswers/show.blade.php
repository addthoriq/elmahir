@extends('admin.layouts2.app')

@section('title', 'Detail Tugas')

@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<!-- Custom Stylesheet -->
<link href="{{ asset('qlab/plugins/summernote/dist/summernote.css') }}" rel="stylesheet">
<style>
    .card .card-body .basic-list-group .list-group a {
        transition: none;
    }
    .card .card-body .basic-list-group .list-group .drop-down {
        top: -2rem !important;
    }
    .card .card-body .row .col-md-4 .drop-down {
        top: -2rem !important;
    }
    .card .card-body .row .col-md-4 .drop-down ul li a:hover {
        color: #1a56ff;
    }
    .card .card-body .row .col-md-4 .dropdown-profile li a span {
        transition-duration: none;
        transition: none;
    }
     .card .card-body .row .col-md-4 .dropdown-profile li a {
        transition: none;
     }
</style>
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mt-3 pb-0">
      <div class="col-md-6">
        <h4 class="section-title">Jawaban Siswa</h4>
        <p class="section-lead mt-1"><i class="fas fa-angle-double-right text-primary"></i> Anda dapat melihat tugas siswa dan memberikan nilai.</p>
      </div>
      <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Daftar Tugas</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </div>
    <!-- row -->

    <!-- Modal -->
    @include('admin.taskAnswers.modalEditScore')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-center mb-1">
                            <div class="col-md-8">
                                <div class="card-title mb-0">{{ $task->course->list_course }} - {{ $task->title }}</div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end align-items-center">
                                <b>{{ $assessment ? $assessment->score." poin" : 'Belum Dinilai' }}</b>
                                <button class="btn btn-rounded" style="background-color: transparent;" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="drop-down dropdown-profile dropdown-menu pb-0">
                                    <div class="dropdown-content-body pb-0">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#scoreModal">
                                                    <i class="far fa-edit"></i> <span>Edit Nilai</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-trash"> </i> <span>Hapus</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <img src="{{Avatar::create($task->course->user->name)->toBase64()}}" height="20" width="20" class="mr-1" />
                            <b class="mr-4">{{ $task->course->user->name }}</b>
                            Publish {{ date_format($task->created_at,"d M Y") }} 
                            {{ $task->updated_at ? "(Diedit ".date_format($task->updated_at,"d M Y").")" : ""  }}
                        </div>

                        <p class="mt-2 mb-0"><b>Tugas</b>{!! $task->description !!}</p>

                        <div class="d-flex flex-row justify-content-start mt-5">
                            <img src="{{Avatar::create($classHistory->student->name)->toBase64()}}" height="20" width="20" class="mr-1" />
                            <b class="mr-4">{{ $classHistory->student->name }}</b>
                            Diserahkan {{ date_format($answers->created_at,"d M Y") }} 
                            {{ $answers->updated_at ? "(Diedit ".date_format($answers->updated_at,"d M Y").")" : ""  }}
                        </div>
                        <p class="mt-2 mb-0"><b>Jawaban</b>{!! $answers->answer !!}</p>
                        <p class="mt-5 mb-1">0 Komentar</p>
                        <form action="">
                            <div class="row border-top pt-3 mt-0 d-flex align-items-center">
                                <div class="col-md-1">
                                    <img src="{{Avatar::create($task->course->user->name)->toBase64()}}" height="40" width="40" />
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Komentar anda..." />
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
                        <div class="card-title">File Jawaban</div>
                        <div class="basic-list-group mt-3">
                            <ul class="list-group list-group-flush">
                                @if (empty($files[0]))
                                    <p>Tidak ada file yang diserahkan untuk tugas ini.</p>
                                @endif
                                @foreach ($files as $file)
                                <li class="list-group-item px-2">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="d-flex flex-column" style="word-wrap: break-word;">
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
                                                            <a href="{{ route('task.deleteFileHome', $file->id) }}">
                                                                <i class="icon-trash"></i> <span>Hapus</span>
                                                            </a>
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