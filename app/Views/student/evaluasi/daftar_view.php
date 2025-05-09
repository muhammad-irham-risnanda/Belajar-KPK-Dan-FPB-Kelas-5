<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/quiz.css'); ?>">
<title>Evaluasi</title>
    <style>
    body {
        background-image: url('<?php echo base_url('assets/images/hero-bg.png'); ?>');
        background-size: cover;
        background-position: center;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <h1>Evaluasi</h1>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo site_url('pages/authenticate_evaluasi'); ?>" method="post">
                    <div class="form-group d-flex align-items-center mb-3">
                        <label for="username" class="mr-2">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required style="flex: 1;">
                    </div>
                    <div class="form-group d-flex align-items-center mb-3">
                        <label for="kelas" class="mr-2">Kelas:</label>
                        <input type="text" id="kelas" name="kelas" class="form-control" required style="flex: 1;">
                    </div>
                    <div class="form-group d-flex align-items-center mb-3 password-field">
                        <label for="password" class="mr-2">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required
                            style="flex: 1;">
                    </div>
                    <a href="<?php echo base_url('index.php/pages/home'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary mr-2">Login</button>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box">
                <h2>Petunjuk untuk Evaluasi ini</h2>
                <p>Silakan masukkan username, kelas, dan password Anda untuk masuk ke Evaluasi. Akun yang digunakan
                    adalah akun yang telah kalian buat</p>
                <p>Kerjakan semua soal dalam waktu yang telah diberikan</p>
            </div>
        </div>
    </div>
</div>