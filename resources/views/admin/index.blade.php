@extends('admin.layouts2.app')

@section('title', 'Home')

@section('style')
<link href="{{ asset('inspinia/css/plugins/chartist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
  <section class="section">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
              <a href="{{route('course.index')}}"><i class="fas fa-book"></i></a>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Mapel</h4>
              </div>
              <div class="card-body">
                {{ $courses->count() }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
              <a href="{{ route('student.index') }}"><i class="fas fa-graduation-cap"></i></a>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Murid</h4>
              </div>
              <div class="card-body">
                {{ $students->count() }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
              <a href="{{route('teacher.index')}}"><i class="fas fa-chalkboard-teacher"></i></a>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Guru</h4>
              </div>
              <div class="card-body">
                {{ $teachers->count() }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
              <a href="{{route('user.index')}}"><i class="fas fa-user"></i></a>
            </div>
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
  </section>
@endsection

@section('script')
<!-- iCheck -->
<script src="{{ asset('inspinia/js/plugins/iCheck/icheck.min.js') }}"></script>
<!-- ChartJS-->
<script src="{{asset('inspinia/js/plugins/chartJs/Chart.min.js')}}"></script>
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
