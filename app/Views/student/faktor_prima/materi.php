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
        <h1 class="underline"><b>Menentukan KPK dan FPB Menggunakan Faktor Prima</b></h1>
        <h2 style="text-align:center">Bilangan Prima</h2>
        <div class="text-right mb-4">
          <img src="<?php echo base_url() . 'assets/images/faktor_prima1.png'; ?>" alt="Deskripsi gambar">
        </div>
        <div class="text-center mb-4">
          <h2>Saringan Eratosthenes</h2>
          <img src="<?php echo base_url() . 'assets/images/faktor_prima2.png'; ?>" alt="Deskripsi gambar">
        </div>
        <h2>Cara menggunakan Teknik saringan Eratosthenes adalah sebagai berikut.</h2>
        <ul class="list-unstyled">
          <li>&bull; Buat kolom dari angka 1-100</li>
          <div class="text-center mb-4">
            <img src="<?php echo base_url() . 'assets/images/faktor_prima3.png'; ?>" alt="Deskripsi gambar">
          </div>
          <li>&bull; Lalu ikuti langkah dibawah ini</li>
          <div class="text-center mb-4">
            <img src="<?php echo base_url() . 'assets/images/faktor_prima4.png'; ?>" alt="Deskripsi gambar">
          </div>
        </ul>
      </div>
      <div class="mt-4 p-4 content-box rounded">
        <h2 class="underline"><b>Menyatakan Bilangan sebagai Hasil Perkalian Bilangan Prima</b></h2>
        <div class="text-center mb-4">
          <img src="<?php echo base_url() . 'assets/images/faktor_prima5.png'; ?>" alt="Deskripsi gambar">
        </div>
        <images src="<?php echo base_url() . 'assets/images/faktor_prima6.png'; ?>" alt="Deskripsi gambar">
          <p>Untuk menentukan faktorisasi bilangan prima bilangan yang lebih
            besar, kita dapat menggunakan pohon faktor. Ayo kita perhatikan
            contoh berikut.</p>
          <div class="text-center mb-4">
            <images src="<?php echo base_url() . 'assets/images/faktor_prima7.png'; ?>" alt="Deskripsi gambar">
          </div>
          <div>Faktorisasi prima dari 196 adalah 2 x 2 x 7 x 7
            <p>Faktorisasi prima dari 300 adalah 2 x 2 x 3 x 5 x 5</p>
          </div>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <a href="<?php echo base_url('index.php/pages/faktor_prima_materi2'); ?>" class="btn btn-dark mx-1">
          <span class="d-inline-block" style="margin-right: 5px;">Selanjutnya</span> <i class="fas fa-arrow-right"></i>
        </a>
      </div>
  </main>