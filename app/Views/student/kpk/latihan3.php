<title>Latihan KPK</title>
<div id="content" class="content flex-grow-1">
    <header class="p-4 bg-dark d-flex justify-content-between align-items-center">
        <button id="toggleButton" class="btn btn-secondary"><i class="fas fa-bars"></i></button>
        <h1 class="h3 text-white mx-auto">LATIHAN KPK</h1>
    </header>
    <style>
        body {
            background-image: url('<?php echo base_url('assets/images/hero-bg.png'); ?>');
            background-size: cover;
            background-position: center;
        }
    </style>
    <main class="p-4 flex-grow-1 overflow-auto">
        <div class="mt-4">
            <div class="mt-4 p-4 content-box rounded">
                <h1 class="text-center">Latihan KPK</h1>
                <p class="text-center"><strong>Jawab soal tentang KPK yang diberikan dengan benar dan jujur</strong></p>
                <div id="questions-container"></div>

                <div class="text-center">
                    <button class="btn btn-primary" onclick="evaluateAnswers()">Selesai</button>
                    <button class="btn btn-secondary" onclick="resetQuiz()">Reset</button>
                </div>
                <p id="result" class="result text-center"></p>
                <p id="score" class="result text-center"></p> <!-- Tempat untuk menampilkan nilai -->
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="<?php echo base_url('/siswa/latihan-kpk-2'); ?>" class="btn btn-dark mx-1">
                    <i class="fas fa-arrow-left"></i> <span class="d-inline-block"
                        style="margin-left: 5px;">Kembali</span>
                </a>
            </div>
        </div>
    </main>
    <script src="<?php echo base_url('assets/js/kpk3.js'); ?>"></script>