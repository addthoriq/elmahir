<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header" style="padding: 30px 25px;">
                <div class="dropdown profile-element">
                    <h2 class="text-white font-weight-bold p-0 m-0">E-Learning</h2>
                </div>
                <div class="logo-element">
                    EL
                </div>
            </li>

            {{-- Main Navigate --}}
            <li class="text-secondary py-2 px-3" style="background-color: #2F4050">
                <span class="nav-label">Navigasi Utama</span>
            </li>
            <li class="{{ Request::is('home') || Request::is('home/*')? 'active' : '' }}">
                <a href="{{ route('home.index') }}"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
            </li>
            <li class="{{ Request::is('teacher', 'teacher-deactived') || Request::is('teacher/*', 'teacher-deactived/*')? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="nav-label">Data Guru</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('teacher/create')? 'active' : '' }}">
                        <a href="{{route('teacher.create')}}">Tambah Guru</a>
                    </li>
                    <li class="{{ Request::is('teacher')? 'active' : '' }}">
                        <a href="{{ route('teacher.index') }}">Beranda</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('student','alumni') || Request::is('student/*','alumni/*')? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="nav-label">Data Siswa</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('student/create')? 'active' : '' }}">
                        <a href="{{route('student.create')}}">Tambah Siswa</a>
                    </li>
                    <li class="{{ Request::is('student')? 'active' : '' }}">
                        <a href="{{ route('student.index') }}">Beranda</a>
                    </li>
                    <li class="{{ Request::is('alumni')? 'active' : '' }}">
                        <a href="{{ route('alumni.index') }}">Daftar Alumni</a>
                    </li>
                </ul>
            </li>

            {{-- Manajemen Kelas dan Mapel --}}
            <li class="text-secondary py-2 px-3" style="background-color: #2F4050">
                <span class="nav-label">Manajemen Kelas & Mapel</span>
            </li>
            <li class="{{ Request::is('course', 'course-detail', 'course-nonactived') || Request::is('course/*', 'course-detail/*', 'course-nonactived/*')? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-window-restore"></i>
                    <span class="nav-label">Mata Pelajaran</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('course-detail/create')? 'active' : '' }}">
                        <a href="{{route('course-detail.create')}}">Tambah Mapel</a>
                    </li>
                    <li class="{{ Request::is('course/create')? 'active' : '' }}">
                        <a href="{{route('course.create')}}">Tambah Mapel & Pengajar</a>
                    </li>
                    <li class="{{ Request::is('course')? 'active' : '' }}">
                        <a href="{{ route('course.index') }}">Beranda Mapel</a>
                    </li>
                    <li class="{{ Request::is('course-detail')? 'active' : '' }}">
                        <a href="{{ route('course-detail.index') }}">Daftar Mapel</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('classroom','year') || Request::is('classroom/*','year/*') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span class="nav-label">Manajemen Kelas</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('classroom/create')?'active':''}}">
                        <a href="{{ route('classroom.create') }}"> Tambah Kelas</a>
                    </li>
                    <li class="{{ Request::is('classroom')?'active':''}}">
                        <a href="{{ route('classroom.index') }}"> Daftar Kelas</a>
                    </li>
                    <li class="{{ Request::is('year')?'active':''}}">
                        <a href="{{ route('year.index') }}"> Daftar Tahun Ajaran</a>
                    </li>
                </ul>
            </li>
            {{-- Kompetensi Siswa --}}
            <li class="text-secondary py-2 px-3" style="background-color: #2F4050">
                <span class="nav-label">Kompetensi Siswa</span>
            </li>
            <li class="{{ Request::is('sectioncourse') || Request::is('sectioncourse/*') || Request::is('section/*') ? 'active' : '' }}">
                <a href="{{ route('sectioncourse.courselist') }}"><i class="fa fa-book"></i> <span class="nav-label">Materi</span></a>
            </li>
            <li class="{{ Request::is('task') || Request::is('task/*') || Request::is('answertask/*') ? 'active' : '' }}">
                <a href="{{ route('task.index') }}"><i class="fa fa-tasks"></i> <span class="nav-label">Tugas</span></a>
            </li>
            {{-- Sistem Seting --}}
            <li class="text-secondary py-2 px-3" style="background-color: #2F4050">
                <span class="nav-label">Pengaturan</span>
            </li>
            <li class="{{ Request::is('user') || Request::is('user/*')? 'active' : '' }}">                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="nav-label">Data User</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('user/create')? 'active' : '' }}">
                        <a href="{{route('user.create')}}">Tambah User</a>
                    </li>
                    <li class="{{ Request::is('user')? 'active' : '' }}">
                        <a href="{{ route('user.index') }}">Beranda</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Sistem Setting</span></a>
            </li>
        </ul>
    </div>
</nav>
