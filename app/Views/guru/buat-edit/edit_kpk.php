<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/form.css'); ?>">

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Edit Pertanyaan KPK</h2>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('welcome/update_kpk/'.$kpk->id); ?>" method="post">
                <div class="form-group">
                    <label for="question">Pertanyaan:</label>
                    <textarea id="question" name="question" required class="form-control" rows="4"><?php echo $kpk->question; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="option_a">Opsi A:</label>
                    <input type="text" id="option_a" name="option_a" value="<?php echo $kpk->option_a; ?>" required class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="option_b">Opsi B:</label>
                    <input type="text" id="option_b" name="option_b" value="<?php echo $kpk->option_b; ?>" required class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="option_c">Opsi C:</label>
                    <input type="text" id="option_c" name="option_c" value="<?php echo $kpk->option_c; ?>" required class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="option_d">Opsi D:</label>
                    <input type="text" id="option_d" name="option_d" value="<?php echo $kpk->option_d; ?>" required class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="answer">Jawaban (A/B/C/D):</label>
                    <input type="text" id="answer" name="answer" value="<?php echo $kpk->answer; ?>" required class="form-control">
                </div>
                
                <div class="form-group d-flex justify-content-between">
                    <a href="<?php echo site_url('welcome/soal_kpk'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>