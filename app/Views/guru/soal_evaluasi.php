<title>List Soal Dan Batas Waktu Mengerjakan</title>
<!-- Main Content -->
<div class="container mt-4">
    <h1 class="mb-4 text-center">List Soal Dan Batas Waktu Mengerjakan</h1>
    <h2 class="mb-3">Soal Evaluasi</h2>

    <!-- Search Bar -->
    <form method="GET" action="<?php echo site_url('welcome/soal_evaluasi'); ?>" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>"
                class="form-control" placeholder="Search question...">
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
                    <th>Question</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Answer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($evaluasi)): ?>
                    <?php foreach ($evaluasi as $row): ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->question; ?></td>
                            <td><?php echo $row->option_a; ?></td>
                            <td><?php echo $row->option_b; ?></td>
                            <td><?php echo $row->option_c; ?></td>
                            <td><?php echo $row->option_d; ?></td>
                            <td><?php echo $row->answer; ?></td>
                            <td>
                                <a href="<?php echo site_url('welcome/edit_evaluasi/' . $row->id); ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?php echo site_url('welcome/delete_evaluasi/' . $row->id); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="<?php echo site_url('welcome/create_evaluasi'); ?>" class="btn btn-primary mb-3">Tambah Pertanyaan</a>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-4">
                <?php echo $pagination; ?>
            </ul>
        </nav>
    </div>
    <!-- Link tambahan di bawah pagination -->
    <div class="text-center mb-4">
        <a href="<?php echo site_url('welcome/waktu'); ?>" class="btn btn-secondary">Lihat Waktu</a>
        <a href="<?php echo site_url('welcome/soal_kpk'); ?>" class="btn btn-secondary">Lihat Soal
            KPK</a>
        <a href="<?php echo site_url('welcome/soal_fpb'); ?>" class="btn btn-secondary">Lihat Soal FPB</a>
        <a href="<?php echo site_url('welcome/soal_faktor_prima'); ?>" class="btn btn-secondary">Lihat Soal Faktor
            Prima</a>
        <a href="<?php echo site_url('welcome/soal_evaluasi'); ?>" class="btn btn-secondary active-link">Lihat Soal
            Evaluasi</a>
    </div>
</div>
</div>