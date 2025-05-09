<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/form.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login Guru</title>
    <style>
        body {
            background-image: url('<?php echo base_url('assets/guru/images/freelance-img.jpg'); ?>');
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

        <h2 class="text-center">Login Guru</h2>
        <form action="<?php echo site_url('auth/login'); ?>" method="post" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
                <div class="error-message" id="usernameError"></div> <!-- Error message for username -->
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" required>
                    <div class="input-group-append">
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary" aria-label="Toggle password visibility">
                            <span id="eyeIcon" class="fa fa-eye"></span>
                        </button>
                    </div>
                </div>
                <div class="error-message" id="passwordError"></div> <!-- Error message for password -->
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">Ingat Saya</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center mt-3">
            <a href="<?php echo site_url('auth/login_siswa'); ?>">Login Siswa</a>
        </div>
    </div>

    <script>
        // JavaScript to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle the eye icon
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        function validateForm() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            let isValid = true;

            // Clear previous error messages
            document.getElementById('usernameError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            // Validate username length
            if (username.length > 35) {
                document.getElementById('usernameError').textContent = 'Username cannot exceed 35 characters.';
                isValid = false;
            }

            // Validate password length
            if (password.length < 8) {
                document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long.';
                isValid = false;
            }

            return isValid; // Allow or prevent form submission
        }

        // On page load, check for cookies and fill the form if they exist
        window.onload = function() {
            const usernameCookie = getCookie('username');
            const passwordCookie = getCookie('password');

            if (usernameCookie) {
                document.getElementById('username').value = usernameCookie;
                document.getElementById('rememberMe').checked = true; // Check the "Remember Me" checkbox
            }
            if (passwordCookie) {
                document.getElementById('password').value = passwordCookie;
            }
        };

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }
    </script>