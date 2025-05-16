<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('<?php echo base_url('assets/images/hero-bg.png'); ?>');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div id="content" class="content flex-grow-1">
        <header class="p-4 bg-dark d-flex justify-content-between align-items-center">
            <button id="toggleButton" class="btn btn-secondary"><i class="fas fa-bars"></i></button>
            <h1 class="h3 text-white mx-auto">Welcome <?= htmlspecialchars($username); ?></h1>
        </header>

        <main class="p-4 flex-grow-1 overflow-auto">
            <div class="container mt-4">
                <h1 class="h3 text-center">Silahkan pilih materi yang ingin dibelajari dulu</h1>
                <div class="row">
                    <div class="col-md-3">
                        <div class="p-4 content-box rounded border-black shadow-sm">
                            <h5><a href="<?php echo base_url('/siswa/materi-kpk'); ?>"
                                    class="text-decoration-none">KPK</a></h5>
                            <p>Belajar materi tentang Kelipatan persekutuan terkecil (KPK)</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4 content-box rounded border-black shadow-sm">
                            <h5><a href="<?php echo base_url('/siswa/materi-fpb'); ?>"
                                    class="text-decoration-none">FPB</a></h5>
                            <p>Belajar materi tentang Faktor Persekutuan terbesar (FPB)</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4 content-box rounded border-black shadow-sm">
                            <h5><a href="<?php echo base_url('/siswa/materi-faktor-prima'); ?>"
                                    class="text-decoration-none">Faktor Prima</a></h5>
                            <p>Belajar materi tentang Faktor Prima</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-4 content-box rounded border-black shadow-sm">
                            <h5><a href="<?php echo base_url('index.php/pages/evaluasi'); ?>"
                                    class="text-decoration-none">Evaluasi</a></h5>
                            <p>Berisi soal evaluasi untuk mengukur pemahaman Anda</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <h1 class="h3 text-center">Tujuan Dan Capaian Pembelajaran</h1>
                <div class="mt-4">
                    <div class="mt-4 p-4 content-box rounded">
                        <h2 class="underline">Capaian Pembelajaran</h2>
                        <p>Pada akhir fase C, peserta didik dapat menunjukkan pemahaman dan intuisi bilangan (number
                            sense) pada bilangan cacah sampai 1.000.000. Mereka dapat membaca, menulis, menentukan nilai
                            tempat, membandingkan, mengurutkan, melakukan komposisi dan dekomposisi bilangan tersebut.
                            Mereka juga dapat menyelesaikan masalah yang berkaitan dengan uang. Mereka dapat melakukan
                            operasi penjumlahan, pengurangan, perkalian, dan pembagian bilangan cacah sampai 100.000.
                            Mereka juga dapat menyelesaikan masalah yang berkaitan dengan KPK dan FPB.</p>
                    </div>
                    <div class="mt-4 p-4 content-box rounded">
                        <h2 class="underline">Tujuan Pembelajaran</h2>
                        <ul class="list-unstyled">
                            <li>&bull; Menentukan kelipatan bilangan.</li>
                            <li>&bull; Menentukan kelipatan persekutuan dua bilangan atau lebih.</li>
                            <li>&bull; Menentukan kelipatan persekutuan terkecil dua bilangan atau lebih.</li>
                            <li>&bull; Menyelesaikan masalah yang berkaitan dengan KPK.</li>
                            <li>&bull; Menentukan faktor suatu bilangan.</li>
                            <li>&bull; Menentukan faktor persekutuan dua bilangan atau lebih.</li>
                            <li>&bull; Menentukan faktor persekutuan terkecil suatu bilangan atau lebih.</li>
                            <li>&bull; Menyelesaikan masalah yang berkaitan dengan FPB.</li>
                            <li>&bull; Memahami bilangan prima.</li>
                            <li>&bull; Menentukan bilangan prima di bawah 100.</li>
                            <li>&bull; Menentukan faktor prima suatu bilangan.</li>
                            <li>&bull; Menentukan KPK dan FPB dengan menggunakan bilangan prima.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <h1 class="h3 text-center">Media Pembelajaran ini dibuat Untuk Memenuhi Persyaratan dalam Menyelesaikan
                    Program Strata-1 Pendidikan Komputer dengan judul: Pengembangan Media Pembelajaran Interaktif
                    Berbasis Web Pada Materi FPB Dan KPK Kelas V Dengan metode Demonstrasi</h1>
                <div class="mt-4 p-4 content-box rounded">
                    <h3 class="underline h5 font-weight-bold text-center">Informasi Pengembang</h3>
                    <ul class="list-unstyled mt-2">
                        <li>&bull; Nama: Muhammad Irham Risnanda</li>
                        <li>&bull; Email: irhamrisnanda89@gmail.com</li>
                        <li>&bull; Pembimbing 1: Nuruddin Wiranda, S.Kom., M.Cs.</li>
                        <li>&bull; Pembimbing 2: Novan Alkaf B Saputra, S. Kom., M. T.</li>
                        <li>&bull; Program Studi: S1 Pendidikan Komputer</li>
                        <li>&bull; Fakultas: Keguruan dan Ilmu Pendidikan</li>
                        <li>&bull; Instansi: Universitas Lambung Mangkurat</li>
                    </ul>
                </div>
                <div class="mt-4 p-4 content-box rounded">
                    <h3 class="underline h5 font-weight-bold text-center">Daftar Pustaka</h3>
                    <p class="mt-2">Buku matematika kelas 5 kurikulum merdeka</p>
                </div>
            </div>
        </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>