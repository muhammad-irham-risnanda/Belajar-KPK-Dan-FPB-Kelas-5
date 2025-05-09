<title>List Soal Dan Batas Waktu Mengerjakan</title>
<!-- Main Content -->
<div class="container mt-4">
    <h1 class="mb-4 text-center">List Soal Dan Batas Waktu Mengerjakan</h1>
    <h2 class="mb-3">Soal KPK</h2>

    <!-- Search Bar -->
    <form method="get" action="<?php echo site_url('welcome/soal_kpk'); ?>" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="<?php echo isset($search_query) ? $search_query : ''; ?>"
                class="form-control" placeholder="Cari Pertanyaan...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
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
                <?php if (!empty($kpk)): ?>
                    <?php foreach ($kpk as $item): ?>
                        <tr>
                            <td><?php echo $item->id; ?></td>
                            <td><?php echo $item->question; ?></td>
                            <td><?php echo $item->option_a; ?></td>
                            <td><?php echo $item->option_b; ?></td>
                            <td><?php echo $item->option_c; ?></td>
                            <td><?php echo $item->option_d; ?></td>
                            <td><?php echo $item->answer; ?></td>
                            <td>
                                <a href="<?php echo site_url('welcome/edit_kpk/' . $item->id); ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?php echo site_url('welcome/delete_kpk/' . $item->id); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this item?');">Hapus</a>
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
        <a href="<?php echo site_url('welcome/create_kpk'); ?>" class="btn btn-primary mb-3">Tambah Pertanyaan</a>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mb-4">
                <?php echo $pagination; ?>
            </ul>
        </nav>
    </div>
    <!-- Link tambahan di bawah pagination -->
    <div class="text-center mb-4">
        <a href="<?php echo site_url('welcome/waktu'); ?>" class="btn btn-secondary">Lihat Waktu</a>
        <a href="<?php echo site_url('welcome/soal_kpk'); ?>" class="btn btn-secondary active-link">Lihat Soal KPK</a>
        <a href="<?php echo site_url('welcome/soal_fpb'); ?>" class="btn btn-secondary">Lihat Soal FPB</a>
        <a href="<?php echo site_url('welcome/soal_faktor_prima'); ?>" class="btn btn-secondary">Lihat Soal Faktor
            Prima</a>
        <a href="<?php echo site_url('welcome/soal_evaluasi'); ?>" class="btn btn-secondary">Lihat Soal Evaluasi</a>
    </div>
</div>
</div>