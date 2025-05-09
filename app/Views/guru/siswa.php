<title>List Guru Dan Siswa</title>
<!-- Main Content -->
<div class="flex-grow-1 p-4">
    <h1 class="mb-4">List Siswa</h1>

    <!-- Form Pencarian -->
    <form method="post" action="<?php echo site_url('welcome/list_siswa'); ?>" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="<?php echo isset($search) ? $search : ''; ?>"
                placeholder="Cari siswa..." class="form-control" />
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <div class="table-container">
        <table class="table table-bordered table-striped" id="studentsTable">
            <thead class="thead-light">
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($students)): ?>
                    <?php foreach ($students as $s): ?>
                        <tr>
                            <td><?php echo $s->id; ?></td>
                            <td><?php echo $s->username; ?></td>
                            <td><?php echo $s->class; ?></td>
                            <td>
                                <a href="<?php echo site_url('welcome/edit_siswa/' . $s->id); ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?php echo site_url('welcome/delete_siswa/' . $s->id); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data siswa ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <a href="<?php echo site_url('auth/register_siswa'); ?>" class="btn btn-primary mb-3">Tambah Siswa</a>
    <!-- Pagination Links -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php echo $pagination; // Menampilkan link pagination ?>
        </ul>
    </nav>
    <div class="text-center mt-4">
        <a href="<?php echo site_url('welcome/list_guru'); ?>" class="btn btn-secondary">Lihat Guru</a>
        <a href="<?php echo site_url('welcome/list_siswa'); ?>" class="btn btn-secondary active-link">Lihat Siswa</a>
    </div>
</div>
</div>