<!-- app/Views/guru/edit_guru.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/guru/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Guru</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('guru/updateGuru') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password (baru):</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= site_url('guru') ?>" class="btn btn-secondary">
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

</html>
