<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Soal Evaluasi</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/guru/evaluasi/store'); ?>" method="post">
                <div class="form-group">
                    <label>Pertanyaan</label>
                    <input type="text" name="question" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Opsi A</label>
                    <input type="text" name="option_a" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Opsi B</label>
                    <input type="text" name="option_b" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Opsi C</label>
                    <input type="text" name="option_c" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Opsi D</label>
                    <input type="text" name="option_d" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Jawaban Benar <small>(A/B/C/D)</small></label>
                    <input type="text" name="answer" class="form-control" maxlength="1" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('/guru/evaluasi'); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
