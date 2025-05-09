<title>Quiz Faktor Prima</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/quiz.css'); ?>">
<style>
    body {
        background-image: url('<?php echo base_url('assets/images/hero-bg.png'); ?>');
        background-size: cover;
        background-position: center;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h1>Quiz Faktor Prima</h1>
                    </div>

                    <div class="box-body">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <form id="quizForm" action="<?php echo site_url('pages/submit_soal_faktor_prima'); ?>"
                            method="post">
                            <?php foreach ($faktor_primas as $index => $faktor_prima): ?>
                                <div class="question">
                                    <p><?php echo ($index + 1) . ". " . $faktor_prima->question; ?></p>
                                    <!-- Menambahkan nomor pertanyaan -->
                                    <label><input type="radio" name="answer_<?php echo $faktor_prima->id; ?>" value="A"
                                            onchange="updateStatus(<?php echo $index; ?>)">
                                        <?php echo $faktor_prima->option_a; ?></label><br>
                                    <label><input type="radio" name="answer_<?php echo $faktor_prima->id; ?>" value="B"
                                            onchange="updateStatus(<?php echo $index; ?>)">
                                        <?php echo $faktor_prima->option_b; ?></label><br>
                                    <label><input type="radio" name="answer_<?php echo $faktor_prima->id; ?>" value="C"
                                            onchange="updateStatus(<?php echo $index; ?>)">
                                        <?php echo $faktor_prima->option_c; ?></label><br>
                                    <label><input type="radio" name="answer_<?php echo $faktor_prima->id; ?>" value="D"
                                            onchange="updateStatus(<?php echo $index; ?>)">
                                        <?php echo $faktor_prima->option_d; ?></label><br>
                                </div>
                            <?php endforeach; ?>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box">
                    <h2>Silakan jawab semua pertanyaan yang diberikan dalam batas waktu yang telah diberikan</h2>
                    <p>Sisa waktu bisa di lihat dibawah ini</p>
                    <div id="countdown">
                        <!-- Menampilkan waktu limit -->
                    </div>
                    <h3>Status Jawaban</h3>
                    <div class="question-status-container" id="questionStatus">
                        <?php foreach ($faktor_primas as $index => $faktor_prima): ?>
                            <div class="question-status not-answered" id="status_<?php echo $index; ?>">
                                <?php echo ($index + 1); ?> <!-- Hanya menampilkan nomor soal -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk memulai hitung mundur
        function startCountdown(duration) {
            let timer = duration, hours, minutes, seconds;
            const countdownElement = document.getElementById('countdown');
            const quizForm = document.getElementById('quizForm'); // Ambil elemen form

            const interval = setInterval(function () {
                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer % 3600) / 60, 10);
                seconds = parseInt(timer % 60, 10);

                // Menampilkan waktu dalam format HH:MM:SS
                countdownElement.textContent = hours + " jam " + minutes + " menit " + seconds + " detik";

                // Jika waktu habis, hentikan interval dan kirim form
                if (--timer < 0) {
                    clearInterval(interval);
                    countdownElement.textContent = "Waktu Habis!";
                    quizForm.submit(); // Mengirim form secara otomatis
                }
            }, 1000);
        }

        function updateStatus(index) {
            const statusElement = document.getElementById('status_' + index);
            statusElement.classList.remove('not-answered');
            statusElement.classList.add('answered');
        }

        window.onload = function () {
            // Ambil waktu limit dari PHP dan konversi dari menit ke detik
            const timeLimitInMinutes = <?php echo $time_limit->time_limit; ?>;
            const timeLimitInSeconds = timeLimitInMinutes * 60; // Konversi menit ke detik
            startCountdown(timeLimitInSeconds);
        };
    </script>
</body>