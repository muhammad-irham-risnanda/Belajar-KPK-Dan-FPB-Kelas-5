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
    <h1 class="h3 text-white mx-auto">MATERI FPB</h1>
  </header>

  <main class="p-4 flex-grow-1 overflow-auto">
    <div class="mt-4">
      <div class="mt-4 p-4 content-box rounded">

        <h1 class="underline">Faktor Persekutuan</h1>
        <p>Faktor Persekutuan adalah bilangan-bilangan yang dapat membagi dua atau lebih bilangan tanpa menyisakan
          sisa.
          Dalam hal ini, kita mencari semua faktor yang sama dari dua atau lebih bilangan.
        <h1 class="underline">Contoh Faktor Persekutuan</h1>
        <h2 class="font-weight-bold">Contoh 1</h2>
        <p>Misalkan kita memiliki dua bilangan: 12 dan 18.</p>
        <P>Faktor dari 12: 1, 2, 3, 4, 6, 12</P>
        <P>Faktor dari 18: 1, 2, 3, 6, 9, 18</P>
        <P>Dari daftar faktor di atas, kita dapat melihat bahwa faktor yang sama dari 12 dan 18 adalah: 1, 2, 3, dan 6
        </P>
        <P>Jadi, faktor persekutuan dari 12 dan 18 adalah 1, 2, 3, dan 6.</P>
        <h2 class="font-weight-bold">Contoh 2</h2>
        <p>Misalkan kita memiliki dua bilangan: 7 dan 21.</p>
        <P>Faktor dari 7: 1, 7</P>
        <P>Faktor dari 21: 1, 3, 7, 21</P>
        <P>Dari daftar faktor di atas, faktor yang sama dari 7 dan 21 adalah: 1 dan 7</P>
        <P>Jadi, faktor persekutuan dari 7 dan 21 adalah 1 dan 7.</P>
        <div class="text-center mb-4">
          <img src="<?php echo base_url() . 'assets/images/faktorpersekutuan1.png'; ?>" alt="Deskripsi gambar">
        </div>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <a href="<?php echo base_url('index.php/pages/fpb_materi'); ?>" class="btn btn-dark mx-1">
          <i class="fas fa-arrow-left"></i> <span class="d-inline-block" style="margin-left: 5px;">Kembali</span>
        </a>
        <a href="<?php echo base_url('index.php/pages/fpb_materi3'); ?>" class="btn btn-dark mx-1">
          <span class="d-inline-block" style="margin-right: 5px;">Selanjutnya</span> <i class="fas fa-arrow-right"></i>
        </a>
      </div>
  </main>