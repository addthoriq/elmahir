<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item {{Request::is('students/home')||Request::is('students/home/*')?'active':''}}">
        <a href="{{route('s1.index')}}" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Pelajaran</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="#" class="nav-link">Materi</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Tugas</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="fas fa-align-justify"></i><span>Riwayat Kelas</span></a>
      </li>
      <li class="nav-item {{Request::is('students/profile')||Request::is('students/profile/*')?'active':''}}">
        <a href="{{route('spr.index')}}" class="nav-link"><i class="fas fa-user"></i><span>Profil</span></a>
      </li>
    </ul>
  </div>
</nav>
