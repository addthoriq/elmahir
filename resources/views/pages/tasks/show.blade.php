@extends('layouts.app')

@section('title', 'Tugas')

@section('style')
<style>
    .hover:hover {
        background-color: #efefef;
    }
    .detail:hover {
        background-color: #e5e5e5;
    }
</style>
<link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('inspinia/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row wrapper white-bg page-heading">
    <div class="col-lg-10">
        <h2>Daftar Materi</h2>
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
        <div class="ibox-title d-flex justify-content-between flex-row align-items-center">
            <h5>
				{{ $task->title }}
            </h5>
        </div>
        <div class="row">
            <div class="col-md-9 pr-0">
                <div class="ibox-content profile-content">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="text-muted">
                            Diposting tanggal {{ $task->created_at->format('d M Y') }}
                        </div>
                        @php
                            $myDateTime = DateTime::createFromFormat('Y-m-d', $task->end_periode);
                            $dayShow = $myDateTime->format('d M Y');
                        @endphp
                            <div class="btn-group align-items-center">
                                Tenggat
                                <button class="btn btn-primary btn-sm ml-2"><i class="fa fa-calendar"></i> {{ $dayShow }}</button>
                                <a href="{{ route('answertask.home', $task->id) }}" class="btn btn-success btn-sm"><i class="fa fa-folder-open"></i> Tugas Siswa</a>
                            </div>
                    </div>
                    <p class="mt-4">{{ $task->description }}</p>
                    <div class="btn-group mt-3">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#taskModal"><i class="fa fa-edit"></i> Edit Tugas</button>
                    </div>
                </div>

                <!-- Modal -->
                @include('pages.tasks.editModalTask')
                @include('pages.tasks.addModalFileTask')

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

            <div class="col-md-3 pl-0">
                <div class="ibox-content px-0 py-0">
                    <div class="feed-activity-list">
                        <h3 class="ml-4 mt-3 mb-1">File Tugas</h3>
                        @if (session('notif'))
                            <div class="alert alert-success alert-dismissable mx-4 my-3">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{session('notif')}}
                            </div>
                        @endif
                        <ul class="list-unstyled file-list px-3 mt-3">
                            @foreach ($fileTask as $file)
                            <li class="d-flex justify-content-between align-items-center">
                                <a href=""><i class="fa fa-file"></i> {{ $file->title }}</a>
                                <div class="btn-group">
                                    <a href="{{ route('task.fileDownload', $file->id) }}" class="btn btn-success btn-xs text-white"><i class="fa fa-download"></i></a>
                                    <a href="" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                </div>
                            </li>
                            @endforeach
                        </ul> 
                    <button href="" class="btn btn-primary mx-3 mt-1 mb-3" data-toggle="modal" data-target="#fileModal"><i class="fa fa-plus"></i> Tambah File</button>
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
<script src="{{ asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var date1 = $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: "yyyy-mm-dd"
            // format: "dd-mm-yyyy"
        });

        var date2 = $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: "yyyy-mm-dd"
            // format: "dd-mm-yyyy"
        });

        $("#add").click(function(){
              $(".erase").after("<div class='row clone bg-muted p-2'><div class='col-md-10'><div class='fileinput fileinput-new m-0' data-provides='fileinput'><span class='btn btn-default btn-file'><span class='fileinput-new'>Pilih File...</span><span class='fileinput-exists'>Ubah</span><input type='file' name='file[]'/></span><span class='fileinput-filename'></span></div> </div><div class='col-md-2'><button type='button' class='btn btn-lg btn-danger'><i class='fa fa-close'></i></button></div></div>");
            });

        $(".boxs").on("click",".btn-danger",function(){ 
            $(this).parents(".clone").remove();
        });

    });
</script>
@endsection