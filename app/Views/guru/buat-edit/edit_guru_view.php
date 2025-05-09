<title>Edit Guru</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/form.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<body>
    <div class="container mt-5">
        <h1>Edit Data Guru</h1>
        <form action="<?php echo site_url('welcome/update_guru'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo $user->username; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password (biarkan kosong jika tidak ingin mengubah):</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="input-group-append">
                        <span class="input-group-text password-toggle" id="togglePassword"
                            aria-label="Toggle password visibility">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="<?php echo site_url('welcome/list_guru'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            // Toggle the eye / eye slash icon
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>