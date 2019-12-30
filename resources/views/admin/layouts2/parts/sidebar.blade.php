<div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label text-secondary">Utama</li>
                    <li class="{{ Request::is('home') || Request::is('home/*')? 'active' : '' }}">
                        <a href="#" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Beranda</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('teacher') || Request::is('teacher/*')? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Pengajar</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="{{ Request::is('teacher.index')? 'active' : '' }}"><a href="{{ route('teacher.index') }}">Daftar Pengajar</a></li>
                            <li class="{{ Request::is('teacher.create')? 'active' : '' }}"><a href="{{ route('teacher.create') }}">Tambah Pengajar</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('student') || Request::is('student/*')? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Data Siswa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="{{ Request::is('student/index')? 'active' : '' }}"><a href="{{ route('student.index') }}">Daftar Siswa</a></li>
                            <li class="{{ Request::is('student/create')? 'active' : '' }}"><a href="{{ route('student.create') }}">Tambah Siswa</a></li>
                        </ul>
                    </li>


                    <li class="nav-label text-secondary">Manajemen</li>
                    <li class="{{ Request::is('course-detail', 'course-nonactived') || Request::is('course-detail/*', 'course-nonactived/*')? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Mata Pelajaran</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="{{ Request::is('course-detail')? 'active' : '' }}"><a href="{{route('course-detail.index')}}">Daftar Mapel</a></li>
                            <li class="{{ Request::is('course-detail/create')? 'active' : '' }}"><a href="{{route('course-detail.create')}}">Tambah Daftar Mapel</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('course') || Request::is('course/*')? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-pin menu-icon"></i> <span class="nav-text">Pengajar Mapel</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="{{ Request::is('course/index')? 'active' : '' }}"><a href="{{ route('course.index') }}">Data Mapel</a></li>
                            <li class="{{ Request::is('course/create')? 'active' : '' }}"><a href="{{ route('course.create') }}">Tambah Data Mapel</a></li>
                        </ul>
                    </li>

                    <li class="nav-label text-secondary">Kompetensi Siswa</li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="icon-book-open menu-icon"></i><span class="nav-text">Materi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="icon-paper-clip menu-icon"></i><span class="nav-text">Tugas Siswa</span>
                        </a>
                    </li>

                    <li class="nav-label text-secondary">Sistem Manajemen</li>
                    <li class="{{ Request::is('user') || Request::is('user/*')? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">User</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="{{ Request::is('user/index')? 'active' : '' }}"><a href="{{ route('user.index') }}">Daftar User</a></li>
                            <li class="{{ Request::is('user/create')? 'active' : '' }}"><a href="{{ route('user.create') }}">Tambah Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="icon-settings menu-icon"></i><span class="nav-text">Role</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="icon-wrench menu-icon"></i><span class="nav-text">Pengaturan</span>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
