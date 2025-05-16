<head>
    <title>Hasil Evaluasi Umum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header class="bg-dark text-white p-3 text-center">
        <h1 class="h3 m-0"><i class="fas fa-check-circle"></i> Hasil Evaluasi Umum</h1>
    </header>

    <main class="container py-5 flex-grow-1 text-center">
        <div class="alert alert-success shadow-sm">
            <h4 class="alert-heading">Selamat!</h4>
            <p>Evaluasi selesai. Berikut hasil kamu:</p>
        </div>

        <ul class="list-group mb-4 mx-auto" style="max-width:400px;">
            <li class="list-group-item"><strong>Jawaban Benar:</strong> <?= $correct ?> / <?= $total ?></li>
            <li class="list-group-item"><strong>Skor Akhir:</strong> <?= $score ?></li>
        </ul>

        <a href="<?= site_url('siswa'); ?>" class="btn btn-success btn-lg">
            <i class="fas fa-home"></i> Kembali ke Dashboard
        </a>
    </main>
</body>