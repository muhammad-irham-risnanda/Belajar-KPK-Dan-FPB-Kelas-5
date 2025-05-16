<title>List Guru</title>
<?= view('guru/header') ?>
<?= view('guru/sidebar') ?>

<main class="flex-grow-1 p-4">
  <?php $current = service('uri')->getSegment(2); ?>

  <div class="btn-group mb-4" role="group">
    <a href="<?= site_url('/guru/siswa') ?>" class="btn btn<?= $current === 'siswa' ? '' : '-outline' ?>-primary">
      <i class="fas fa-user-graduate mr-1"></i> Siswa
    </a>
    <a href="<?= site_url('/guru/guru') ?>" class="btn btn<?= $current === 'guru' ? '' : '-outline' ?>-primary">
      <i class="fas fa-chalkboard-teacher mr-1"></i> Guru
    </a>
  </div>

  <div class="d-flex justify-content-between align-items-center mb-1">
    <h4><i class="fas fa-list"></i> Daftar Guru</h4>
    <a href="<?= base_url('/register/guru'); ?>" class="btn btn-success">
      <i class="fas fa-plus"></i> Tambah Guru
    </a>
  </div>
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $user['id'] ?></td>
          <td><?= $user['username'] ?></td>
          <td>
            <a href="<?= site_url('guru/editGuru/' . $user['id']) ?>" class="btn btn-sm btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <a href="<?= site_url('guru/deleteGuru/' . $user['id']) ?>" class="btn btn-sm btn-danger"
              onclick="return confirm('Are you sure?')">
              <i class="fas fa-trash-alt"></i> Delete
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>

<?= view('guru/footer') ?>