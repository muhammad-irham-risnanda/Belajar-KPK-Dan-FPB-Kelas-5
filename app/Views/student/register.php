    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Daftar akun siswa</title>
    <style>
        body {
            background-image: url('<?php echo base_url('assets/images/belajar.jpg'); ?>');
            background-size: cover;
            background-position: center;
        }
        .form-container {
            max-width: 400px; /* Set width for the registration box */
            margin: 50px auto; /* Center horizontally */
            padding: 30px; /* Add padding inside the box */
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
        }
        .notification {
            display: none;
            position: relative;
            margin-bottom: 15px;
            background-color: #f44336; /* Red */
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        .error-message {
            color: red; /* Error message color */
            font-size: 0.9em; /* Smaller font size for error messages */
        }
    </style>

<div class="form-container">
        <div class="notification" id="notification"></div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <h2 class="text-center">Daftar Akun Siswa</h2>
        <form method="post" action="<?php echo site_url('auth/register_siswa'); ?>" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
                <div class="error-message" id="usernameError"></div> <!-- Error message for username -->
            </div>
            <div class="form-group">
                <label for="class">Kelas:</label>
                <input type="number" class="form-control" name="class" id="class" min="1" max="6" required>
                <div class="error-message" id="classError"></div> <!-- Error message for class -->
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" required>
                    <div class="input-group-append">
                        <button type="button" id="togglePasswordRegister" class="btn btn-outline-secondary" aria-label="Toggle password visibility">
                            <span id="eyeIconRegister" class="fa fa-eye"></span>
                        </button>
                    </div>
                </div>
                <div class="error-message" id="passwordError"></div> <!-- Error message for password -->
            </div>
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>
        <div class="text-center mt-3">
        <p class="text-center mt-3">Sudah punya akun <a href="<?php echo site_url('auth/login_siswa'); ?>">Login di sini</a></p>
        </div>
    </div>

    <script>
        // JavaScript to toggle password visibility for registration
        document.getElementById('togglePasswordRegister').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIconRegister');

            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle the eye icon
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        function validateForm() {
            const username = document.getElementById('username').value;
            const classInput = document.getElementById('class').value;
            const password = document.getElementById('password').value;
            let message = '';

            // Clear previous error messages
            document.getElementById('usernameError').textContent = '';
            document.getElementById('classError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            // Validate username length
            if (username.length > 35) {
                message += 'Username cannot exceed 35 characters.\n';
                document.getElementById('usernameError').textContent = 'Username cannot exceed 35 characters.';
            }

            // Validate class input
            if (classInput < 1 || classInput > 6) {
                message += 'Class must be between 1 and 6.\n';
                document.getElementById('classError').textContent = 'Class must be between 1 and 6.';
            }

            // Validate password length
            if (password.length < 8) {
                message += 'Password must be at least 8 characters long.\n';
                document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long.';
            }

            // If there are validation errors, show the notification
            if (message) {
                showNotification(message);
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }

        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';

            // Hide the notification after 3 seconds
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }
    </script>