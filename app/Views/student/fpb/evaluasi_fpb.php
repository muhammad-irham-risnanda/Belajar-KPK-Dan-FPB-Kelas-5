<head>
    <title>Evaluasi FPB</title>
    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Header -->
    <header class="bg-dark text-white p-3 text-center">
        <h1 class="h3 m-0"><i class="fas fa-stopwatch"></i> Evaluasi FPB</h1>
    </header>

    <!-- Main Content -->
    <main class="container py-4 flex-grow-1">
        <div id="timer" class="alert alert-info text-center font-weight-bold">
            Sisa waktu: <span id="countdown"></span>
        </div>

        <?= csrf_field() ?>
        <form id="examForm" action="<?= site_url('siswa/evaluasi/fpb/submit'); ?>" method="post">
            <?php $no = 1;
            foreach ($questions as $q): ?>
                <div class="card mb-3 shadow-sm">
                    <div class="card-header font-weight-bold">
                        <?= $no++ ?>. <?= esc($q['question']) ?>
                    </div>
                    <div class="card-body">
                        <?php foreach (['a', 'b', 'c', 'd'] as $opt): ?>
                            <div class="custom-control custom-radio mb-2">
                                <input class="custom-control-input" type="radio" id="q<?= $q['id'] . '_' . $opt ?>"
                                    name="<?= $q['id'] ?>" value="<?= $opt ?>" required>
                                <label class="custom-control-label" for="q<?= $q['id'] . '_' . $opt ?>">
                                    <?= esc($q['option_' . $opt]) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary btn-lg btn-block">
                <i class="fas fa-paper-plane"></i> Kirim Jawaban
            </button>
        </form>
    </main>

    <!-- Timer Script -->
    <script>
        let timeLeft = <?= $timeLimit ?> * 60; // menit → detik

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            document.getElementById('countdown').textContent =
                `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

            if (timeLeft <= 0) {
                clearInterval(timer);
                alert("Waktu habis! Jawaban akan dikirim otomatis.");
                document.getElementById("examForm").submit();
            }
            timeLeft--;
        }

        updateTimer();
        const timer = setInterval(updateTimer, 1000);
    </script>
</body>

</html>