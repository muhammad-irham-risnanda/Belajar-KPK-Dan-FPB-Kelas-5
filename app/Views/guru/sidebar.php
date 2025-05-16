<!-- assets/guru/sidebar.php -->
<div class="d-flex flex-grow-1">
  <nav class="bg-light border-end p-3" id="sidebar" style="width: 250px; min-height: 100vh;">
    <h5 class="mb-4"><i class="fas fa-user-tie mr-2"></i> Menu Guru</h5>
    <ul class="list-unstyled">

      <!-- Guru dan Siswa -->
      <li>
        <a class="d-flex justify-content-between align-items-center text-dark" data-toggle="collapse" href="#menuGuruSiswa">
          <span><i class="fas fa-users mr-2"></i> Guru & Siswa</span> <i class="fas fa-chevron-down"></i>
        </a>
        <div class="collapse mt-2" id="menuGuruSiswa">
          <ul class="list-unstyled pl-3">
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/guru'); ?>"><i class="fas fa-chalkboard-teacher mr-2"></i> Guru</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/siswa'); ?>"><i class="fas fa-user-graduate mr-2"></i> Siswa</a></li>
          </ul>
        </div>
      </li>

      <!-- Soal -->
      <li class="mt-3">
        <a class="d-flex justify-content-between align-items-center text-dark" data-toggle="collapse" href="#menuSoal">
          <span><i class="fas fa-file-alt mr-2"></i> Soal</span> <i class="fas fa-chevron-down"></i>
        </a>
        <div class="collapse mt-2" id="menuSoal">
          <ul class="list-unstyled pl-3">
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/time-limits'); ?>"><i class="fas fa-clock mr-2"></i> Waktu</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/kpk'); ?>"><i class="fas fa-divide mr-2"></i> KPK</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/fpb'); ?>"><i class="fas fa-percentage mr-2"></i> FPB</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/faktor-prima'); ?>"><i class="fas fa-cubes mr-2"></i> Faktor Prima</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/evaluasi'); ?>"><i class="fas fa-check-double mr-2"></i> Evaluasi</a></li>
          </ul>
        </div>
      </li>

      <!-- Nilai -->
      <li class="mt-3">
        <a class="d-flex justify-content-between align-items-center text-dark" data-toggle="collapse" href="#menuNilai">
          <span><i class="fas fa-chart-bar mr-2"></i> Nilai</span> <i class="fas fa-chevron-down"></i>
        </a>
        <div class="collapse mt-2" id="menuNilai">
          <ul class="list-unstyled pl-3">
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/nilai-kpk'); ?>">KPK</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/nilai-fpb'); ?>">FPB</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/nilai-faktor-prima'); ?>">Faktor Prima</a></li>
            <li><a class="text-dark d-block py-1" href="<?= site_url('/guru/nilai-evaluasi'); ?>">Evaluasi</a></li>
          </ul>
        </div>
      </li>

      <!-- Logout -->
      <li class="mt-4">
        <a href="<?= base_url('logout'); ?>" class="text-danger">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
