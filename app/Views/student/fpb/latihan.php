<title>Latihan FPB-Faktor</title>
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
            <h1 class="h3 text-white mx-auto">Latihan FPB</h1>
        </header>
        
        <main class="p-4 flex-grow-1 overflow-auto">
            <div class="mt-4">
                <div class="mt-4 p-4 content-box rounded">
                    <h1 class="mt-4">Latihan Mencari Faktor</h1>
                    <p>*Masukkan angka kedalam kotak biru*</p>
                    <div id="target-number" class="mt-3"></div>
                    <div id="factors" class="mt-3"></div>
                    <div id="draggable-numbers" class="mt-3"></div>
                    <button id="reset-button" class="btn btn-primary mt-3">Reset</button>
                    <div id="message" class="mt-3"></div>
                    <div id="answers" class="mt-3">Jawaban: </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href="<?php echo base_url('/siswa/latihan-fpb-2'); ?>" class="btn btn-dark mx-1">
                        <span class="d-inline-block" style="margin-right: 5px;">Selanjutnya</span> <i
                            class="fas fa-arrow-right"></i>
                    </a>
                </div>
        </main>
        <script src="<?php echo base_url('assets/js/fpb1.js'); ?>"></script>