@extends('admin.layouts.app')

@section('title', 'Materi')

@section('style')
<link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<style>
    .detail:hover {
        background-color: #e5e5e5;
    }
    .onlamp {
        background-color: #e5e5e5;
    }
</style>

@endsection

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Materi</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Data Materi</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox bg-white">
        <div class="ibox-title">
            <h5>
                {{ $section->course->list_course }} - {{ $section->title }}
            </h5>
        </div>
        <div class="row">

            <div class="col-md-9 pr-0">
                <div class="ibox-content no-padding border-left-right d-flex justify-content-center bg-dark scrollspy-example">
                    @if (Request::is('section/*/home'))
                        <img alt="image" class="img-fluid" src="{{ Storage::url('img/education.jpg') }}" style="height: 400px;">
                    @else
                        @if ($files->name_file)
                            @if ($files->type_file == 'image/png')
                                <img alt="image" class="img-fluid" src="{{ Storage::url($files->name_file) }}" style="height: 400px;">
                            @else
                                <embed src="{{ Storage::url($files->name_file) }}" type="application/pdf" width="100%" height="400px" />
                            @endif
                        @else
                            <iframe width="80%" height="400" src="{{ $files->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif
                    @endif
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>{{ $section->title }}</strong></h4>
                    <p>{{ $section->description }}</p>
                    <div class="user-button">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#materiModal"><i class="fa fa-edit"></i> Edit Materi</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Baris Komentar -->
                {{-- <div class="ibox-content">
                    <div class="d-flex flex-row mb-4">
                        <input type="text" class="form-control mr-2" placeholder="Komentar anda...">
                        <button class="btn btn-primary btn-md">Kirim</button>
                    </div>
                    <h5>12 Komentar</h5>
                    <div class="row">
                        <div class="col-md-1 pr-1">
                            <img class='rounded-circle' src="https://lh3.googleusercontent.com/a-/AAuE7mDdmqVJ7MauhshxQ-leAa_efJUaXDWAlje85EXA-Q=s32-c" width='38px' height='38px' />
                        </div>
                        <div class="col-md-10 mb-2 pl-0">
                            <h4 class="mb-0">Ammar Fakhri</h4>
                            <small class="pt-0">12 Nov 2019 . 19:30 WIB</small>
                            <p class="mb-2">Saya agak bingung dengan beberapa istilah yang baru ini</p>
                            <div class="d-flex flex-row mb-2">
                                <input type="text" class="form-control form-control-sm mr-2" placeholder="Komentar anda...">
                                <button class="btn btn-primary btn-sm">Kirim</button>
                            </div>
                            <div class="row">
                                <div class="col-md-1 pr-1">
                                    <img class='rounded-circle' src="https://lh3.googleusercontent.com/a-/AAuE7mDdm-f5fpba5VwChYrp2u0OgUOiSY_EyQbMMcCcrA=s32-c" width='38px' height='38px' />
                                </div>
                                <div class="col-md-10 pl-4">
                                    <h4 class="mb-0">Kurniadi Putra</h4>
                                    <small class="pt-0">12 Nov 2019 . 19:30 WIB</small>
                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 pr-1">
                            <img class='rounded-circle' src="https://lh3.googleusercontent.com/a-/AAuE7mC8wPW1rsVwy08anyXz4KvtMvi5TqtxvOMHKVF1Lw=s32-c" width='38px' height='38px' />
                        </div>
                        <div class="col-md-10 mb-2 pl-0">
                            <h4 class="mb-0">Ahmad Nasyith</h4>
                            <small class="pt-0">12 Nov 2019 . 19:30 WIB</small>
                            <p class="mb-0">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <a href="">Reply</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 pr-1">
                            <img class='rounded-circle' src="https://lh3.googleusercontent.com/a-/AAuE7mC06erJIc0Z3KQTIXNw4NAVUDac9gYhEB6qtdPY=s32-c" width='38px' height='38px' />
                        </div>
                        <div class="col-md-10 mb-2 pl-0">
                            <h4 class="mb-0">Irhamullah <strong class="label label-warning">Pengajar</strong></h4>
                            <small class="pt-0">12 Nov 2019 . 19:30 WIB</small>
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <a href="">Reply</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 pr-1">
                            <img class='rounded-circle' src="https://lh3.googleusercontent.com/a-/AAuE7mDdm-f5fpba5VwChYrp2u0OgUOiSY_EyQbMMcCcrA=s32-c" width='38px' height='38px' />
                        </div>
                        <div class="col-md-10 mb-2 pl-0">
                            <h4 class="mb-0">Kurniadi Putra</h4>
                            <small class="pt-0">12 Nov 2019 . 19:30 WIB</small>
                            <p class="mb-0">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <a href="">Reply</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 pr-1">
                            <img class='rounded-circle' src="https://lh3.googleusercontent.com/a-/AAuE7mAjxeu1SINEQh-9IFUVPUTP6InvfdIqBafGYbeG=s32-c" width='38px' height='38px' />
                        </div>
                        <div class="col-md-10 mb-2 pl-0">
                            <h4 class="mb-0">Satuny</h4>
                            <small class="pt-0">12 Nov 2019 . 19:30 WIB</small>
                            <p class="mb-0">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                            <a href="">Reply</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 pr-1">
                            <img class='rounded-circle' src="https://lh3.googleusercontent.com/a-/AAuE7mAW5HJ8s6nItHeSEWE7nTEjIGdr4SIDY5j366Jk6Q=s32-c" width='38px' height='38px' />
                        </div>
                        <div class="col-md-10 mb-2 pl-0">
                            <h4 class="mb-0">Udin Pane</h4>
                            <small class="pt-0">12 Nov 2019 . 19:30 WIB</small>
                            <p class="mb-0">Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
                            <a href="">Reply</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-3 px-5">
                        <button class="btn btn-outline btn-primary btn-block">Lihat lainnya</button>
                    </div>
                </div> --}}
            </div>

            <!-- Modal Create Chapter -->
            @include('admin.sections.editModalSection')
            @include('admin.sections.addModalFileSection')

            <div class="col-md-3 pl-0">
                <div class="ibox-content px-0 py-0">
                    <div class="feed-activity-list">
                        <h3 class="ml-4 mt-3 mb-1">File Materi</h3>
                        @if (session('notif'))
                            <div class="alert alert-success alert-dismissable mx-4 my-3">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{session('notif')}}
                            </div>
                        @endif
                        <?php $no = 1; ?>
                        <ul class="nav metismenu">
                            <li class="bg-default">
                                <a href="#" class="tree-toggle py-2" style="color: #676A6C">{{ $section->title }}<br>
                                <small> file . publish : {{ $section->created_at ? $section->created_at->format('d M Y') : 'undefined' }}</small>
                                </a>
                                <ul class="tree pl-0">
                                @foreach ($fileSections as $file)
                                    <li class="nav-link p-0 detail pl-4 pr-3 py-2 {{ Request::url() == route('section.show', $file->id) ? 'onlamp' : '' }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('section.show', $file->id) }}" style="color: #676A6C">{{ $file->title }}<br>
                                            <small>
                                                <i class="fa fa-file-pdf-o" size="10"></i>
                                                publish : {{ date_format($file->created_at,"d M Y") }}
                                            </small>
                                            </a>
                                            <form action="{{ route('section.deleteFile', $file->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group">
                                                    <a href="{{ route('section.fileDownload', $file->id) }}" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </li>
                        </ul>
                        <button href="" class="btn btn-primary m-3" data-toggle="modal" data-target="#fileModal"><i class="fa fa-plus"></i> Tambah Materi</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

@section('script')
<!-- Jasny -->
<script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script type="text/javascript">
     $(document).ready(function(){
         $("#add").click(function(){
               $(".erase").after("<div class='row clone bg-muted p-2'><div class='col-md-10'><div class='fileinput fileinput-new m-0' data-provides='fileinput'><span class='btn btn-default btn-file'><span class='fileinput-new'>Pilih File...</span><span class='fileinput-exists'>Ubah</span><input type='file' name='file[]'/></span><span class='fileinput-filename'></span></div> </div><div class='col-md-2'><button type='button' class='btn btn-lg btn-danger'><i class='fa fa-close'></i></button></div></div>");
             });

         $(".boxs").on("click",".btn-danger",function(){
             $(this).parents(".clone").remove();
         });
    });
</script>
@endsection
