<title>Edit Siswa</title>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Siswa</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('guru/updateSiswa') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $student['id'] ?>">

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?= $student['username'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="class">Kelas:</label>
                        <input type="text" id="class" name="class" class="form-control" value="<?= $student['class'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password (baru):</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= site_url('guru/siswa') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- JS (opsional jika pakai Bootstrap JS interaktif) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
