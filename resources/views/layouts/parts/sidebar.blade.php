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
        <li class="{{ Request::is('teacher') || Request::is('teacher/*')? 'active' : '' }}">
            <a href="{{ route('teacher.index') }}"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Data Guru</span></a>
        </li>
        <li class="{{ Request::is('student') || Request::is('student/*')? 'active' : '' }}">
            <a href="{{ route('student.index') }}"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Data Siswa</span></a>
        </li>
        
        {{-- Manajemen Kelas dan Mapel --}}
        <li class="text-secondary py-2 px-3" style="background-color: #2F4050">
            <span class="nav-label">Manajemen Kelas & Mapel</span>
        </li>
        <li class="{{ Request::is('course') || Request::is('course/*')? 'active' : '' }}">
            <a href="{{ route('course.index') }}"><i class="fa fa-window-restore"></i> <span class="nav-label">Mata Pelajaran</span></a>
        </li>
        <li class="{{ Request::is('class') || Request::is('class/*')? 'active' : '' }}">
            <a href="{{ route('class.index') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Manajemen Kelas</span></a>
        </li>
    
        {{-- Kompetensi Siswa --}}
        <li class="text-secondary py-2 px-3" style="background-color: #2F4050">
            <span class="nav-label">Kompetensi Siswa</span>
        </li>
        <li class="{{ Request::is('section') || Request::is('section/*')? 'active' : '' }}">
            <a href="{{ route('section.index') }}"><i class="fa fa-book"></i> <span class="nav-label">Materi</span></a>
        </li>
        <li class="{{ Request::is('task') || Request::is('task/*')? 'active' : '' }}">
            <a href="{{ route('task.index') }}"><i class="fa fa-tasks"></i> <span class="nav-label">Tugas</span></a>
        </li>
    
        {{-- Sistem Seting --}}
        <li class="text-secondary py-2 px-3" style="background-color: #2F4050">
            <span class="nav-label">Pengaturan</span>
        </li>
        <li class="{{ Request::is('user') || Request::is('user/*')? 'active' : '' }}">
            <a href="{{ route('user.index') }}"><i class="fa fa-users"></i> <span class="nav-label">User</span></a>
        </li>
        <li class="">
            <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Sistem Setting</span></a>
        </li>
    </ul>
</div>