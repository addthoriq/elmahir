<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <span class="text-dark mb-2">View Siswa</span>
  @php
  	$boongan = 1;
  @endphp
  <a class="nav-link {{ Request::is('*/course') ? 'active' : '' }}"href="{{ route('s2.showCourse', $boongan) }}">Semua</a>
  <a class="nav-link {{ Request::is('*/course/section') ? 'active' : '' }}"href="{{ route('s3.showSection', $boongan) }}">Materi</a>
  <a class="nav-link {{ Request::is('*/course/task') ? 'active' : '' }}" href="{{ route('s4.showTask', $boongan) }}">Tugas</a>
  <span class="text-dark mb-2 mt-2">Manajemen</span>
  <a class="nav-link"href="#">Nilai</a>
  <a class="nav-link"href="#">Anggota Kelas</a>
</div>