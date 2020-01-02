@extends('admin.layouts2.app')

@section('title', 'Beranda')

@section('content')

<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row mb-3">
          <div class="col-md-6">
            <h2 class="section-title">Hai, Selamat Datang!</h2>
            <p class="section-lead">Sistem E-Learning MI Al Wahdah Yogyakarta.</p>
          </div>
          <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
            <button class="btn btn-primary btn-sm">Today {{ date('d M Y') }} <i class="fas fa-calendar-alt"></i></button>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Mata Pelajaran</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$courses->count()}}</h2>
                            <a href="{{route('course.index')}}" class="text-white" >Detail <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Siswa</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$students->count()}}</h2>
                            <a href="{{route('student.index')}}" class="text-white" >Detail <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pengajar</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$teachers->count()}}</h2>
                            <a href="{{route('teacher.index')}}" class="text-white" >Detail <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fas fa-chalkboard-teacher"></i></span>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pegawai</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$users->count()}}</h2>
                            <a href="{{route('user.index')}}" class="text-white" >Detail <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-user"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Presentase Siswa</h4>
                        <canvas id="siswa" width="500" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Presentase Pengajar</h4>
                        <canvas id="guru" width="500" height="250"></canvas>
                    </div>
                </div>
                <div class="card-body">
                  <canvas id="teacherChart"></canvas>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection
@section('script')
<script src="{{asset('qlab/js/plugins-init/chartjs-init.js')}}"></script>
<script>
    var murid     = "{{route('home.chartMurid')}}";
    var guru      = "{{route('home.chartGuru')}}";
    $(document).ready(function() {
        $.get(murid, function(response){
            var ctx = document.getElementById('siswa').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        data: response,
                        backgroundColor: [
                            'rgba(54, 162, 235)',
                            'rgba(255, 99, 132)',
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
                            'rgba(54, 162, 235)',
                            'rgba(255, 99, 132)',
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
    });
</script>
@endsection
