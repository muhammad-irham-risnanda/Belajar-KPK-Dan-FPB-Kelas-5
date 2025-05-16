<title>List Soal Dan Batas Waktu Mengerjakan</title>
<?= view('guru/header') ?>
<?= view('guru/sidebar') ?>

<main class="flex-grow-1 p-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $current = service('uri')->getSegment(2); ?>

                <div class="btn-group mb-4" role="group">
                    <a href="<?= site_url('/guru/time-limits') ?>"
                        class="btn btn<?= $current === 'time-limits' ? '' : '-outline' ?>-primary">
                        <i class="fas fa-clock mr-1"></i> Waktu
                    </a>
                    <a href="<?= site_url('/guru/kpk') ?>"
                        class="btn btn<?= $current === 'kpk' ? '' : '-outline' ?>-primary">
                        <i class="fas fa-divide mr-1"></i> KPK
                    </a>
                    <a href="<?= site_url('/guru/fpb') ?>"
                        class="btn btn<?= $current === 'fpb' ? '' : '-outline' ?>-primary">
                        <i class="fas fa-compress-alt mr-1"></i> FPB
                    </a>
                    <a href="<?= site_url('/guru/faktor-prima') ?>"
                        class="btn btn<?= $current === 'faktor-prima' ? '' : '-outline' ?>-primary">
                        <i class="fas fa-cogs mr-1"></i> Faktor Prima
                    </a>
                    <a href="<?= site_url('/guru/evaluasi') ?>"
                        class="btn btn<?= $current === 'evaluasi' ? '' : '-outline' ?>-primary">
                        <i class="fas fa-tasks mr-1"></i> Evaluasi
                    </a>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h4><i class="fas fa-list"></i> Daftar Soal Evaluasi</h4>
                    <a href="<?= base_url('/guru/evaluasi/create'); ?>" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Soal
                    </a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Pertanyaan</th>
                            <th>Opsi A</th>
                            <th>Opsi B</th>
                            <th>Opsi C</th>
                            <th>Opsi D</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($evaluasiList)): ?>
                            <?php foreach ($evaluasiList as $index => $ev): ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= esc($ev['question']); ?></td>
                                    <td><?= esc($ev['option_a']); ?></td>
                                    <td><?= esc($ev['option_b']); ?></td>
                                    <td><?= esc($ev['option_c']); ?></td>
                                    <td><?= esc($ev['option_d']); ?></td>
                                    <td><strong><?= esc($ev['answer']); ?></strong></td>
                                    <td>
                                        <a href="<?= base_url('/guru/evaluasi/edit/' . $ev['id']); ?>"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('/guru/evaluasi/delete/' . $ev['id']); ?>"
                                            class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus soal ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada soal evaluasi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>

<?= view('guru/footer') ?>