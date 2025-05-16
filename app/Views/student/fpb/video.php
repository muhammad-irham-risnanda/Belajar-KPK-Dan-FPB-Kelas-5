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