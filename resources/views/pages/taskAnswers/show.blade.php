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
        <div class="ibox-title">
            <h5>
				<i class="fa fa-document"></i> {{ $task->title }}
            </h5>
        </div>
        <div class="row">
            <div class="col-md-9 pr-0">
                <div class="ibox-content profile-content pt-0">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="text-muted">
                            Diposting tanggal {{ $answer->created_at->format('d M Y') }}
                        </div>
                        @php
                            $myDateTime = DateTime::createFromFormat('Y-m-d', $task->end_periode);
                            $dayShow = $myDateTime->format('d M Y');
                        @endphp
                            <div class="btn-group align-items-center">
                                Tenggat :
                                <button class="btn btn-primary btn-sm ml-2"><i class="fa fa-calendar"></i> {{ $dayShow }}</button>
                            </div>
                    </div>
                    <h5>Deskripsi</h5>
                    <div class="row">
                        <div class="col-md-9">
                            <p>{{ $task->description }}</p>
                        </div>
                    </div>
                    <h5>Jawabanmu</h5>
                    <p>{{ $answer->answer }}</p>
                    
                    @php
                        if (empty($assesment->score)) {
                            $route = "answertask.storeScore";
                        } else {
                            $route = "answertask.updateScore";
                        }
                    @endphp

                    <form action="{{ route($route, $answer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($assesment->score)
                            @method('PUT')
                        @endif
                         
                        <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                   <input type="number" name="score" class="form-control" value="{{ $assesment->score }}">
                                   {{-- <input type="hidden" name=""> --}}
                               </div>
                               <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Beri Nilai</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-md-3 pl-0">
                <div class="ibox-content px-0 py-0">
                    <div class="feed-activity-list">
                        <h3 class="ml-4 mt-3 mb-1">File Jawaban</h3>
                        @if (session('notif'))
                            <div class="alert alert-success alert-dismissable mx-4 my-3">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{session('notif')}}
                            </div>
                        @endif
                        <ul class="list-unstyled file-list px-3 mt-3">
                            @foreach ($files as $file)
                            <li class="d-flex justify-content-between align-items-center">
                                <a href=""><i class="fa fa-file"></i> {{ $file->name_file }}</a>
                                <div class="btn-group">
                                    <a href="" class="btn btn-success btn-xs text-white"><i class="fa fa-download"></i></a>
                                    <a href="" class="btn btn-danger btn-xs text-white"><i class="fa fa-trash"></i></a>
                                </div>
                            </li>
                            @endforeach
                        </ul> 
                    <a href="" class="btn btn-primary mx-3 mt-1 mb-3"><i class="fa fa-plus"></i> Tambah File</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
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
    });
</script>
@endsection