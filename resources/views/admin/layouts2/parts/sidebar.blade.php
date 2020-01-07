<div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label text-secondary">Utama</li>
                    <li class="{{ Request::is('home') || Request::is('home/*')? 'active' : '' }}">
                        <a href="{{route('home.index')}}" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Beranda</span>
                        </a>
                    </li>
                    @can ('index-teacher')
                        <li class="{{ Request::is('teacher') || Request::is('teacher/*')? 'active' : '' }}">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Data Pengajar</span>
                            </a>
                            <ul aria-expanded="false">
                                @can ('create-teacher')
                                    <li class="{{ Request::is('teacher.create')? 'active' : '' }}"><a href="{{ route('teacher.create') }}">Tambah Pengajar</a></li>
                                @endcan
                                @can ('index-teacher')
                                    <li class="{{ Request::is('teacher.index')? 'active' : '' }}"><a href="{{ route('teacher.index') }}">Daftar Pengajar</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can ('index-teacher')
                        <li class="{{ Request::is('student') || Request::is('student/*')? 'active' : '' }}">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-people menu-icon"></i><span class="nav-text">Data Siswa</span>
                            </a>
                            <ul aria-expanded="false">
                                @can ('create-student')
                                    <li class="{{ Request::is('student/create')? 'active' : '' }}"><a href="{{ route('student.create') }}">Tambah Siswa</a></li>
                                @endcan
                                @can ('index-student')
                                    <li class="{{ Request::is('student/index')? 'active' : '' }}"><a href="{{ route('student.index') }}">Daftar Siswa</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    <li class="nav-label text-secondary">Manajemen</li>
                    <li class="{{ Request::is('classroom','year') || Request::is('classroom/*', 'year/*')? 'active' : '' }}">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i> <span class="nav-text">Ruang Kelas</span>
                        </a>
                        @canany(['index-classroom', 'index-schoolyear'])
                            <ul aria-expanded="false">
                                @can ('create-classroom')
                                    <li class="{{ Request::is('classroom/create')? 'active' : '' }}"><a href="{{route('classroom.create')}}">Tambah Kelas</a></li>
                                @endcan
                                @can ('index-classroom')
                                    <li class="{{ Request::is('classroom')? 'active' : '' }}"><a href="{{route('classroom.index')}}">Daftar Kelas</a></li>
                                @endcan
                                @can ('index-schoolyear')
                                    <li class="{{ Request::is('year')? 'active' : '' }}"><a href="{{route('year.index')}}">Daftar Tahun Ajaran</a></li>
                                @endcan
                            </ul>
                        @endcan
                    </li>
                    @can ('index-listcourse')
                        <li class="{{ Request::is('list-course', 'course-nonactived') || Request::is('list-course/*', 'course-nonactived/*')? 'active' : '' }}">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-graph menu-icon"></i> <span class="nav-text">Mata Pelajaran</span>
                            </a>
                            <ul aria-expanded="false">
                                @can ('create-listcourse')
                                    <li class="{{ Request::is('list-course/create')? 'active' : '' }}"><a href="{{route('list-course.create')}}">Tambah Daftar Mapel</a></li>
                                @endcan
                                @can ('index-listcourse')
                                    <li class="{{ Request::is('list-course')? 'active' : '' }}"><a href="{{route('list-course.index')}}">Daftar Mapel</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can ('index-course')
                        <li class="{{ Request::is('course') || Request::is('course/*')? 'active' : '' }}">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-pin menu-icon"></i> <span class="nav-text">Pengajar Mapel</span>
                            </a>
                            <ul aria-expanded="false">
                                @can ('create-course')
                                    <li class="{{ Request::is('course/create')? 'active' : '' }}"><a href="{{ route('course.create') }}">Tambah Data Mapel</a></li>
                                @endcan
                                @can ('index-course')
                                    <li class="{{ Request::is('course/index')? 'active' : '' }}"><a href="{{ route('course.index') }}">Data Mapel</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
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

                    <li class="nav-label text-secondary">Pengaturan</li>
                    @can ('index-user')
                        <li class="{{ Request::is('user') || Request::is('user/*')? 'active' : '' }}">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-people menu-icon"></i><span class="nav-text">User</span>
                            </a>
                            <ul aria-expanded="false">
                                @can ('create-user')
                                    <li class="{{ Request::is('user/create')? 'active' : '' }}"><a href="{{ route('user.create') }}">Tambah User</a></li>
                                @endcan
                                @can ('index-user')
                                    <li class="{{ Request::is('user/index')? 'active' : '' }}"><a href="{{ route('user.index') }}">Daftar User</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can ('index-role')
                        <li class="{{ Request::is('role') || Request::is('role/*')? 'active' : '' }}">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-people menu-icon"></i><span class="nav-text">Peran & Hak Akses</span>
                            </a>
                            <ul aria-expanded="false">
                                <li class="{{ Request::is('role/index')? 'active' : '' }}"><a href="{{ route('role.index') }}">Daftar Peran</a></li>
                                <li class="{{ Request::is('perm/home')? 'active' : '' }}"><a href="{{ route('perm.home') }}">Daftar Hak Akses</a></li>
                            </ul>
                        </li>
                    @endcan
                    <li>
                        <a href="#" aria-expanded="false">
                            <i class="icon-wrench menu-icon"></i><span class="nav-text">Profil</span>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
