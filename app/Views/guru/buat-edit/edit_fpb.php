<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Soal FPB</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/guru/fpb/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?= esc($fpb['id']); ?>">

                <div class="form-group">
                    <label>Pertanyaan</label>
                    <input type="text" name="question" class="form-control" value="<?= esc($fpb['question']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Opsi A</label>
                    <input type="text" name="option_a" class="form-control" value="<?= esc($fpb['option_a']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Opsi B</label>
                    <input type="text" name="option_b" class="form-control" value="<?= esc($fpb['option_b']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Opsi C</label>
                    <input type="text" name="option_c" class="form-control" value="<?= esc($fpb['option_c']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Opsi D</label>
                    <input type="text" name="option_d" class="form-control" value="<?= esc($fpb['option_d']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Jawaban Benar <small>(A/B/C/D)</small></label>
                    <input type="text" name="answer" class="form-control" maxlength="1" value="<?= esc($fpb['answer']); ?>" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="<?= base_url('/guru/fpb'); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>