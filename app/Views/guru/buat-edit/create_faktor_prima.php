<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/form.css'); ?>">

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header">
            <h2>Tambah Pertanyaan Faktor Prima</h2>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('welcome/store_faktor_prima'); ?>" method="post">
                <div class="form-group">
                    <label for="question">Pertanyaan:</label>
                    <input type="text" id="question" name="question" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="option_a">Opsi A:</label>
                    <input type="text" id="option_a" name="option_a" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="option_b">Opsi B:</label>
                    <input type="text" id="option_b" name="option_b" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="option_c">Opsi C:</label>
                    <input type="text" id="option_c" name="option_c" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="option_d">Opsi D:</label>
                    <input type="text" id="option_d" name="option_d" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="answer">Jawaban (A/B/C/D):</label>
                    <input type="text" id="answer" name="answer" required class="form-control">
                </div>

                <div class="form-group d-flex justify-content-between">
                    <a href="<?php echo site_url('welcome/soal_faktor_prima'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                </div>
            </form>
        </div>
    </div>
</div>