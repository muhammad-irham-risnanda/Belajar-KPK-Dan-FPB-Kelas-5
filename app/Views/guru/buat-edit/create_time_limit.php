<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Time Limit</h2>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('/guru/time-limits/store') ?>">
                <div class="mb-3">
                    <label for="time_limit" class="form-label">Time Limit (dalam menit)</label>
                    <input type="text" class="form-control" id="time_limit" name="time_limit" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
