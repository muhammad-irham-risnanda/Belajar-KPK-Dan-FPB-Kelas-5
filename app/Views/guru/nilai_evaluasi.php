<?= view('guru/header') ?>
<?= view('guru/sidebar') ?>
<title>List Nilai Siswa</title>

<main class="flex-grow-1 p-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php $current = service('uri')->getSegment(2); ?>

        <div class="btn-group mb-4" role="group">
          <a href="<?= site_url('/guru/nilai-kpk') ?>"
            class="btn btn<?= $current === 'nilai-kpk' ? '' : '-outline' ?>-primary">
            <i class="fas fa-divide mr-1"></i> Nilai KPK
          </a>
          <a href="<?= site_url('/guru/nilai-fpb') ?>"
            class="btn btn<?= $current === 'nilai-fpb' ? '' : '-outline' ?>-primary">
            <i class="fas fa-compress-alt mr-1"></i> Nilai FPB
          </a>
          <a href="<?= site_url('/guru/nilai-faktor-prima') ?>"
            class="btn btn<?= $current === 'nilai-faktor-prima' ? '' : '-outline' ?>-primary">
            <i class="fas fa-cogs mr-1"></i> Nilai Faktor Prima
          </a>
          <a href="<?= site_url('/guru/nilai-evaluasi') ?>"
            class="btn btn<?= $current === 'nilai-evaluasi' ? '' : '-outline' ?>-primary">
            <i class="fas fa-tasks mr-1"></i> Nilai Evaluasi
          </a>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-2">
          <h4><i class="fas fa-list"></i> Rekap Nilai Evaluasi</h4>
        </div>

        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th width="5%">No</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Skor Evaluasi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($siswaList)): ?>
              <tr>
                <td colspan="4" class="text-center text-muted">Belum ada data nilai Evaluasi.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($siswaList as $idx => $siswa): ?>
                <tr>
                  <td><?= $idx + 1; ?></td>
                  <td><?= esc($siswa['nama']); ?></td>
                  <td><?= esc($siswa['kelas']); ?></td>
                  <td><?= esc($siswa['skor']); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<?= view('guru/footer') ?>