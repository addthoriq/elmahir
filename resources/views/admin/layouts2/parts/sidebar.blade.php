<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html" class="text-white">E - Learning</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html" class="text-white">EL</a>
    </div>
    <ul class="sidebar-menu text-white">
        <li class="menu-header">Main Navigation</li>
        <li class="nav-item dropdown active">
          <a href="{{ route('home.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Beranda</span></a>
        </li>
        <li class="menu-header">Pendataan</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chalkboard-teacher"></i> <span>Data Guru</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('teacher.index') }}">Beranda</a></li>
            <li><a class="nav-link" href="{{ route('teacher.create') }}">Tambah Data</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Data Siswa</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Beranda</a></li>
            <li><a class="nav-link" href="">Tambah Data</a></li>
          </ul>
        </li>
        <li class="menu-header">Manajemen Kelas & Mapel</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard-list"></i> <span>Daftar Mapel</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Beranda</a></li>
            <li><a class="nav-link" href="">Tambah Data</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Data Mapel Kelas</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Beranda</a></li>
            <li><a class="nav-link" href="">Tambah Data</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manajemen Kelas</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Beranda</a></li>
            <li><a class="nav-link" href="">Tambah Data</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link"><i class="fas fa-school"></i><span>Tahun Ajaran</span></a>
        </li>
        <li class="menu-header">Kompetensi Siswa</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link"><i class="fas fa-book"></i><span>Materi</span></a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link"><i class="fas fa-paperclip"></i><span>Tugas</span></a>
        </li>
        <li class="menu-header">Sistem Setting</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
        </li>
      </ul>
  </aside>
</div>