<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Time Limit</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/guru/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Time Limit</h2>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('/guru/time-limits/update') ?>">
                    <input type="hidden" name="id" value="<?= $timeLimit['id'] ?>">

                    <div class="mb-3">
                        <label for="time_limit" class="form-label">Time Limit (Dalam Menit)</label>
                        <input type="text" class="form-control" id="time_limit" name="time_limit"
                            value="<?= $timeLimit['time_limit'] ?>" required>
                    </div>
                    <a href="<?= site_url('/guru/time-limits') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>