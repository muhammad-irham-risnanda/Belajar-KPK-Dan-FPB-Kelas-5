<title>Video Materi FPB</title>
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
        <h1 class="h3 text-white mx-auto">Video FPB</h1>
    </header>
    <div class="p-2 bg-white border border-black d-flex justify-content-center align-items-center">
        <a href="<?php echo base_url('index.php/pages/fpb_materi'); ?>" class="btn btn-dark mx-1">
            <i class="fas fa-book"></i> Materi
        </a>
        <a href="<?php echo base_url('index.php/pages/video_fpb'); ?>" class="btn btn-dark mx-1">
            <i class="fas fa-video"></i> Video
        </a>
        <a href="<?php echo base_url('index.php/pages/fpb_latihan'); ?>" class="btn btn-dark mx-1">
            <i class="fas fa-pencil-alt"></i> Latihan
        </a>
        <a href="<?php echo base_url('index.php/pages/fpb'); ?>" class="btn btn-dark mx-1">
            <i class="fas fa-question-circle"></i> Quiz
        </a>
    </div>
    <main class="p-4 flex-grow-1 overflow-auto">
        <div class="mt-4">
            <div class="mt-4 p-4 content-box rounded">
                <h2 class="underline">Video ringkasan materi FPB</h2>
                <video width="100%" height="500" controls>
                    <source src="<?php echo base_url() . 'assets/images/belajar_fpb.mp4'; ?>" type="video/mp4">
                </video>
            </div>
        </div>
    </main>