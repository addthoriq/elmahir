@extends('admin.layouts2.app')
@section('title', 'Detail Ruang Kelas')
@section('style')
    <link href="{{asset('qlab/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <style media="screen">
        .fileinput-preview.fileinput-exists.img-thumbnail img{
            max-width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col pd-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{route('classroom.index')}}">Daftar Ruang Kelas</a></li>
                    <li class="breadcrumb-item active"><a href="">Detail Ruang Kelas</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- Modal disini --}}
                        @include('admin.classrooms.edit')
                        <div class="card-body">
                            <a data-toggle="modal" class="btn btn-primary btn-sm mb-3" href="#edit"><i class="fa fa-wrench"></i> Ubah Profil Kelas</a>
                            @if (session('notif'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                                    {{session('notif')}}
                                </div>
                            @endif
                            <div class="card-title">
                                <h5>Informasi Kelas {{$data->name}}</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table header-border">
                                    <tbody>
                                        <tr>
                                            <th>Nama Kelas</th>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Wali Kelas</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kapasitas Maksimal Siswa</th>
                                            <td>{{$data->max_student}}</td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Siswa</th>
                                            <td>{{$stds->count()}}</td>
                                        </tr>
                                        <tr>
                                            <th>Anggota Kelas </th>
                                            <td>
                                                <ul>
                                                    @if ($stds)
                                                        @foreach ($stds as $std)
                                                            <li>{{$std->student->name}}</li>
                                                        @endforeach
                                                    @else
                                                        <i>Belum ada siswa disini</i>
                                                    @endif
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Persentase</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <canvas id="siswa" height="50"></canvas>
                            <form action="{{route('classroom.destroy',$data->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <a href="{{route('classroom.index')}}" class="btn btn-sm btn-light"><i class="fa fa-chevron-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-sm btn-danger pull-right" onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus kelas {{$data->name}}?`)'><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('qlab/js/plugins-init/chartjs-init.js')}}"></script>
    <script>
    var murid     = "{{route('classroom.chartMurid',$data->id)}}";
    $.get(murid, function(response){
        var ctx = document.getElementById('siswa').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: response,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                    ],
                    borderWidth: 1
                }]
            }
        });
        function addData(chart, label, color, data) {
            chart.data.datasets.push({
                backgroundColor: color,
                data: data
            });
            chart.update();
        }
    });
    $.get(guru, function(response){
        var ctx = document.getElementById('guru').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: response,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                    ],
                    borderWidth: 1
                }]
            }
        });
        function addData(chart, label, color, data) {
            chart.data.datasets.push({
                backgroundColor: color,
                data: data
            });
            chart.update();
        }
    });
    </script>
@endsection
