<div class="flex-grow-1 p-4">
    <h1 class="mb-4">List Guru Dan Siswa</h1>
    <h1>Search Guru</h1>
    <form method="post" action="">
        <input type="text" name="keyword" value="<?php echo set_value('keyword', $keyword); ?>"
            placeholder="Search by username">
        <input type="submit" name="search" value="Search">
    </form>

    <?php if (!empty($users)): ?>
        <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?php echo $u->id; ?></td>
                            <td><?php echo $u->username; ?></td>
                            <td>
                                <a href="<?php echo site_url('welcome/edit_guru/' . $u->id); ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?php echo site_url('welcome/delete_guru/' . $u->id); ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo site_url('auth/register'); ?>" class="btn btn-primary mb-3">Tambah Guru</a>

        <!-- Paginasi -->
        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="<?php echo site_url('welcome/index?page=' . $i); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="<?php echo site_url('welcome/list_guru'); ?>" class="btn btn-secondary active-link">Lihat Guru</a>
        <a href="<?php echo site_url('welcome/list_siswa'); ?>" class="btn btn-secondary">Lihat Siswa</a>
    </div>
</div>
</div>