<title>List Soal Dan Batas Waktu Mengerjakan</title>
<!-- Main Content -->
<div class="flex-grow-1 p-4">
    <h1 class="mb-4">List Soal Dan Batas Waktu Mengerjakan</h1>
    <h2>Batas Waktu Mengerjakan Soal</h2>
    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Batas Waktu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($time_limits as $time_limit): ?>
                    <tr>
                        <td><?php echo $time_limit->time_limit; ?></td>
                        <td>
                            <a href="<?php echo site_url('welcome/edit_waktu/' . $time_limit->id); ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo site_url('welcome/delete_waktu/' . $time_limit->id); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if (empty($time_limits)): ?>
            <a href="<?php echo site_url('welcome/create_waktu'); ?>" class="btn btn-primary">Add Time Limit</a>
        <?php endif; ?>
    </div>
    <!-- Link tambahan di bawah pagination -->
    <div class="text-center mt-4">
        <a href="<?php echo site_url('welcome/waktu'); ?>" class="btn btn-secondary active-link">Lihat Waktu</a>
        <a href="<?php echo site_url('welcome/soal_kpk'); ?>" class="btn btn-secondary">Lihat Soal KPK</a>
        <a href="<?php echo site_url('welcome/soal_fpb'); ?>" class="btn btn-secondary">Lihat Soal FPB</a>
        <a href="<?php echo site_url('welcome/soal_faktor_prima'); ?>" class="btn btn-secondary">Lihat Soal Faktor
            Prima</a>
        <a href="<?php echo site_url('welcome/soal_evaluasi'); ?>" class="btn btn-secondary">Lihat Soal Evaluasi</a>
    </div>
</div>
</div>