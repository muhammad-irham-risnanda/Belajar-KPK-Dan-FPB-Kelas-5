<title>Latihan Faktor Prima-Bilangan Prima</title>
<style>
    body {
        background-image: url('<?php echo base_url('assets/images/hero-bg.png'); ?>');
        background-size: cover;
        background-position: center;
    }
</style>
<div id="content" class="content flex-grow-1">
    <header class="p-4 bg-dark d-flex justify-content-between align-items-center">
        <button id="toggleButton" class="btn btn-secondary"><i class="fas fa-bars"></i></button>
        <h1 class="h3 text-white mx-auto">LATIHAN FAKTOR PRIMA</h1>
    </header>

    <main class="p-4 flex-grow-1 overflow-auto">
        <div class="mt-4">
            <div class="mt-4 p-4 content-box rounded">
                <h1>Soal Faktorisasi Prima</h1>
                <div class="text-center mb-4">
                    <p><strong>Jawab soal ini dengan benar dan jujur</p>
                    <P>*Jawaban harus pakai spasi contoh faktor dari 8 adalah 2 x 2 x 2*</strong></P>
                </div>
                <div id="questions" class="mb-3"></div>

                <button onclick="checkAnswers()" class="btn btn-primary">Selesai</button>
                <button onclick="resetAnswers()" class="btn btn-secondary">Reset</button>

                <div id="result" class="mt-3"></div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="<?php echo base_url('/siswa/latihan-faktor-prima-2'); ?>" class="btn btn-dark mx-1">
                    <span class="d-inline-block" style="margin-right: 5px;">Selanjutnya</span> <i
                        class="fas fa-arrow-right"></i>
                </a>
            </div>
    </main>
    <script src="<?php echo base_url('assets/js/faktor_prima1.js'); ?>"></script>