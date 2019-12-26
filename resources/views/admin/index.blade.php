@extends('admin.layouts2.app')

@section('title', 'Home')

@section('style')
<link href="{{ asset('inspinia/css/plugins/chartist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('course.index')}}">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-book"></i>
                    </div>
                </a>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Mata Pelajaran</h4>
                  </div>
                  <div class="card-body">
                    {{ $courses->count() }}
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('student.index')}}">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                </a>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Siswa</h4>
                  </div>
                  <div class="card-body">
                    {{ $students->count() }}
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('teacher.index')}}">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </a>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pengajar</h4>
                  </div>
                  <div class="card-body">
                    {{ $teachers->count() }}
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <div class="card card-statistic-1">
                <a href="{{route('user.index')}}">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user"></i>
                    </div>
                </a>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pegawai</h4>
                  </div>
                  <div class="card-body">
                    {{ $users->count() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Presentase Siswa</h4>
                </div>
                <div class="card-body">
                  <canvas id="studentChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Presentase Pengajar</h4>
                </div>
                <div class="card-body">
                  <canvas id="teacherChart"></canvas>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    var murid     = "{{route('home.chartMurid')}}";
    var guru      = "{{route('home.chartGuru')}}";
    $(document).ready(function() {
        $.get(murid, function(response){
            var ctx = document.getElementById('studentChart').getContext('2d');
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
            var ctx = document.getElementById('teacherChart').getContext('2d');
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

        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('MI Al Wahdah Yogyakarta', 'Welcome to E - Learning');

        }, 1300);

        // I-check to do list
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });
</script>
@endsection
