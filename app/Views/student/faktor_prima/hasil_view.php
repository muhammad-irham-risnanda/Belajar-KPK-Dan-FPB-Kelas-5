    <title>Hasil Quiz Faktor Prima</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/quiz.css'); ?>">
    <style>
    body {
        background-image: url('<?php echo base_url('assets/images/hero-bg.png'); ?>');
        background-size: cover;
        background-position: center;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="box p-4 border rounded shadow">
            <div class="text-center mt-4">
                <h1>Hasil Quiz</h1>
                <p>Anda mendapatkan <strong><?php echo $score; ?></strong> dari
                    <strong><?php echo $total_questions; ?></strong> soal.
                </p>
                <p>Nilai: <strong><?php echo ($score / $total_questions) * 100; ?></strong></p>
                <!-- Menampilkan persentase nilai -->
                <a href="<?php echo site_url('pages/faktor_prima'); ?>" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>