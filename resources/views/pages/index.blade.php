@extends('layouts.app')

@section('title', 'Home')

@section('style')
<link href="{{ asset('inspinia/css/plugins/chartist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row border-bottom white-bg dashboard-header">
    <div class="col-md-12 mb-3">
        <h1 class="mb-1">Selamat Datang di E-Learning MI Al Wahdah</h1>
        <small>Jl. Raya Krapyak - Karanganyar Raya RT.05, Karanganyar, Wedomartani, Ngemplak, Sleman, DIY</small>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 bg-danger">
                <div class="row">
                    <div class="col-4 text-center">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Mata Pelajaran </span>
                        <h3 class="font-bold mb-1">{{count($courses)}} Mapel</h3>
                        <a href="{{route('course.index')}}" class="btn btn-xs btn-outline btn-default">Detail</a>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> Guru Pengajar </span>
                    <h3 class="font-bold mb-1">{{count($teachers)}} Guru</h3>
                    <a href="{{route('teacher.index')}}" class="btn btn-xs btn-outline btn-default">Detail</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-graduation-cap fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> Siswa </span>
                    <h3 class="font-bold mb-1">{{count($students)}} Siswa</h3>
                    <a href="{{route('student.index')}}" class="btn btn-xs btn-outline btn-default">Detail</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> User</span>
                    <h3 class="font-bold mb-1">{{count($users)}} User</h3>
                    <a href="{{route('user.index')}}" class="btn btn-xs btn-outline btn-default">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">

            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Presentase Siswa Laki Laki - Perempuan</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="statistic-box mt-0">
                                <canvas id="siswa" height="150"></canvas>
                                <div class="m-t">
                                    <small>Data diambil dari data manajemen kesiswaan.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Presentase Guru Laki Laki - Perempuan</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="statistic-box mt-0">
                                <canvas id="guru" height="150"></canvas>
                                <div class="m-t">
                                    <small>Data diambil dari data manajemen kepegawaian dan guru.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>E-Learning Activity</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/profile.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">5m ago</small>
                                            <strong>Monica Smith</strong> posted a new blog. <br>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/a2.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">2h ago</small>
                                            <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                            <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/a3.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">2h ago</small>
                                            <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 8:30am</small>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/a4.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                            <div class="actions">
                                                <a href=""  class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                <a href=""  class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/a5.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">2h ago</small>
                                            <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                            <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                            <div class="well">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                            </div>
                                            <div class="float-right">
                                                <a href=""  class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/profile.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/a7.jpg') }}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
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
