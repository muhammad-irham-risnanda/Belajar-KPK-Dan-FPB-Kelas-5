<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login Siswa</title>
    <style>
        body {
            background-image: url('<?php echo base_url('assets/images/belajar.jpg'); ?>');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="notification" id="notification"></div>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <h2 class="text-center">Login Siswa</h2>
    <form method="post" action="<?php echo site_url('auth/login_siswa'); ?>" onsubmit="return validateForm();">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username" required>
            <div class="error-message" id="usernameError"></div>
        </div>
        <div class="form-group">
            <label for="class">Kelas:</label>
            <input type="number" class="form-control" name="class" id="class" min="1" max="6" required>
            <div class="error-message" id="classError"></div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="input-group-append">
                    <button type="button" id="togglePasswordLogin" class="btn btn-outline-secondary" aria-label="Toggle password visibility">
                        <span id="eyeIconLogin" class="fa fa-eye"></span>
                    </button>
                </div>
            </div>
            <div class="error-message" id="passwordError"></div>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
            <label class="form-check-label" for="rememberMe">Ingat Saya</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <div class="text-center mt-3">
        <a href="<?php echo site_url('auth/register_siswa'); ?>">Buat akun</a>
        <span class="mx-2">|</span>
        <a href="<?php echo site_url('auth/login'); ?>">Login Guru</a>
    </div>
</div>

<script>
    // JavaScript untuk toggle visibilitas password
    document.getElementById('togglePasswordLogin').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIconLogin');

        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });

    // Mengambil cookie dan mengisi field input
    window.onload = function() {
        const username = getCookie('username');
        const classInput = getCookie('class');

        if (username) {
            document.getElementById('username').value = username;
            document.getElementById('rememberMe').checked = true;
        }
        if (classInput) {
            document.getElementById('class').value = classInput;
        }
    };

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    function validateForm() {
        const username = document.getElementById('username').value;
        const classInput = document.getElementById('class').value;
        const password = document.getElementById('password').value;
        let message = '';

        if (username.length > 35) {
            message += 'Username tidak boleh lebih dari 35 karakter.\n';
        }
        if (classInput < 1 || classInput > 6) {
            message += 'Kelas harus antara 1 dan 6.\n';
        }
        if (password.length < 6) {
            message += 'Password harus minimal 6 karakter.\n';
        }

        if (message) {
            alert(message);
            return false; // Mencegah pengiriman form
        }
        return true; // Mengizinkan pengiriman form
    }
</script>