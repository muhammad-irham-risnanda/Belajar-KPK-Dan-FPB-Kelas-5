<title>List Soal Dan Batas Waktu Mengerjakan</title>
<?= view('guru/header') ?>
<?= view('guru/sidebar') ?>

<main class="flex-grow-1 p-4">
  <?php $current = service('uri')->getSegment(2); ?>

  <div class="btn-group mb-4" role="group">
    <a href="<?= site_url('/guru/time-limits') ?>"
      class="btn btn<?= $current === 'time-limits' ? '' : '-outline' ?>-primary">
      <i class="fas fa-clock mr-1"></i> Waktu
    </a>
    <a href="<?= site_url('/guru/kpk') ?>" class="btn btn<?= $current === 'kpk' ? '' : '-outline' ?>-primary">
      <i class="fas fa-divide mr-1"></i> KPK
    </a>
    <a href="<?= site_url('/guru/fpb') ?>" class="btn btn<?= $current === 'fpb' ? '' : '-outline' ?>-primary">
      <i class="fas fa-compress-alt mr-1"></i> FPB
    </a>
    <a href="<?= site_url('/guru/faktor-prima') ?>"
      class="btn btn<?= $current === 'faktor-prima' ? '' : '-outline' ?>-primary">
      <i class="fas fa-cogs mr-1"></i> Faktor Prima
    </a>
    <a href="<?= site_url('/guru/evaluasi') ?>" class="btn btn<?= $current === 'evaluasi' ? '' : '-outline' ?>-primary">
      <i class="fas fa-tasks mr-1"></i> Evaluasi
    </a>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="d-flex justify-content-between align-items-center mb-2">
          <h4><i class="fas fa-clock"></i> Time Limits</h4>

          <?php if (empty($timeLimits)): ?>
            <a href="<?= site_url('guru/time-limits/create') ?>" class="btn btn-success">
              <i class="fas fa-plus"></i> Tambah Time Limit
            </a>
          <?php endif; ?>
        </div>

        <?php if (empty($timeLimits)): ?>
          <div class="alert alert-warning text-center">
            Belum ada data time limit.
          </div>
        <?php else: ?>
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Durasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($timeLimits as $limit): ?>
                <tr>
                  <td>
                    <?php
                    $minutes = (int) $limit['time_limit'];
                    $hours = floor($minutes / 60);
                    $remainingMinutes = $minutes % 60;

                    if ($hours > 0 && $remainingMinutes > 0) {
                      echo "$hours jam $remainingMinutes menit";
                    } elseif ($hours > 0) {
                      echo "$hours jam";
                    } else {
                      echo "$remainingMinutes menit";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="<?= site_url('guru/time-limits/edit/' . $limit['id']) ?>" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= site_url('guru/time-limits/delete/' . $limit['id']) ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Yakin ingin hapus?')">
                      <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>

<?= view('guru/footer') ?>