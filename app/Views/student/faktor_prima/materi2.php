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
    <h1 class="h3 text-white mx-auto">MATERI FAKTOR PRIMA</h1>
  </header>

  <main class="p-4 flex-grow-1 overflow-auto">
    <div class="mt-4">
      <div class="mt-4 p-4 content-box rounded">
        <h2 class="underline"><b>Menentukan KPK dan FPB Menggunakan Faktorisasi Prima</b></h2>
        <p>Ayo, kita tentukan KPK dan PFB dari bilangan 72 dan 96 dengan menggunakan faktorisasi prima.</p>
        <p><b>Caranya dengan:</b></p>
        <p>Menuliskan faktorisasi prima dari 72 dan 150.
        <p>72 = 2 x 2 x 2 x 3 x 3
        <p>150 = 2 x 3 x 5 x 5</p>
        <div class="text-center mb-4">
          <images src="<?php echo base_url() . 'assets/images/faktor_prima8.png'; ?>" alt="Deskripsi gambar">
        </div>
        <p><b>Menentukan KPK</b>
        <p>KPK dari 72 dan 150 adalah 2 x 3 x 2 x 2 x 3 x 5 x 5 = 1.800
        <p><b>Menentukan FPB</b>
        <p>FPB dari 72 dan 150 adalah 2 x 3 = 6</p>
      </div>
      <div class="mt-4 p-4 content-box rounded">
        <h2><b>Menentukan KPK dan FPB Menggunakan Pembagian Berulang</b></h2>
        <p><b>Ayo kita perhatikan cara menentukan KPK dan FPB dengan menggunakan pembagian berulang.</b></p>
        <div class="text-center mb-4">
          <images src="<?php echo base_url() . 'assets/images/faktor_prima11.png'; ?>" alt="Deskripsi gambar">
        </div>
        <p>KPK dari 72 dan 150 adalah hasil perkalian semua pembagi prima pada pembagian berulang tersebut.
        <p>KPK dari 72 dan 150 adalah 2 x 2 x 2 x 3 x 3 x 5 x 5 = 1.800</p>
        <p>FPB dari 75 dan 150 adalah hasil kali bilangan prima yang dapat membagi habis 75 dan 150.
        <p>FPB dari 75 dan 150 adalah 2 x 3 = 6</p>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <a href="<?php echo base_url('index.php/pages/faktor_prima_materi'); ?>" class="btn btn-dark mx-1">
          <i class="fas fa-arrow-left"></i> <span class="d-inline-block" style="margin-left: 5px;">Kembali</span>
        </a>
      </div>
  </main>