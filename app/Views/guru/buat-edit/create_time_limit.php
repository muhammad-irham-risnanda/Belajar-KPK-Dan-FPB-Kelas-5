<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/form.css'); ?>">

<div class="container mt-5">
    <h1><?php echo isset($time_limit) ? 'Edit' : 'Create'; ?> Time Limit</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="limit_hours">Limit Hours:</label>
            <input type="number" name="limit_hours" value="<?php echo isset($time_limit) ? floor($time_limit->time_limit / 60) : 0; ?>" min="0" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="limit_minutes">Limit Minutes:</label>
            <input type="number" name="limit_minutes" value="<?php echo isset($time_limit) ? $time_limit->time_limit % 60 : 0; ?>" min="0" max="59" class="form-control" required>
        </div>
        <div class="form-group">
            <a href="<?php echo site_url('welcome/waktu'); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary"><?php echo isset($time_limit) ? 'Update' : 'Create'; ?> Time Limit</button>
        </div>
    </form>
</div>