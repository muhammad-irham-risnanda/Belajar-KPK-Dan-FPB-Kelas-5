<title>List Nilai Siswa</title>
<!-- Main Content -->
<div class="container mt-4">
    <h1 class="mb-4 text-center">List Nilai Siswa</h1>
    <h2 class="mb-3">Nilai Materi Faktor Prima</h2>

    <!-- Search Bar -->
    <form method="GET" action="<?php echo site_url('welcome/nilai_faktor_prima'); ?>" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>"
                class="form-control" placeholder="Search nama...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($siswa_faktor_prima)): ?>
                    <?php foreach ($siswa_faktor_prima as $s): ?>
                        <tr>
                            <td><?php echo $s->id; ?></td>
                            <td><?php echo $s->nama; ?></td>
                            <td><?php echo $s->kelas; ?></td>
                            <td><?php echo $s->skor; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-4">
                <?php echo $pagination; ?>
            </ul>
        </nav>
    </div>
    <!-- Link tambahan di bawah pagination -->
    <div class="text-center mb-4">
        <a href="<?php echo site_url('welcome/nilai_kpk'); ?>" class="btn btn-secondary">Lihat Nilai KPK</a>
        <a href="<?php echo site_url('welcome/nilai_fpb'); ?>" class="btn btn-secondary">Lihat Nilai FPB</a>
        <a href="<?php echo site_url('welcome/nilai_faktor_prima'); ?>" class="btn btn-secondary active-link">Lihat
            Nilai Faktor Prima</a>
        <a href="<?php echo site_url('welcome/nilai_evaluasi'); ?>" class="btn btn-secondary">Lihat Nilai Evaluasi</a>
    </div>
</div>
</div>