    <title>Daftar Akun Guru</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/guru/css/form.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('<?php echo base_url('assets/guru/images/freelance-img.jpg'); ?>');
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
        .error-message {
            color: red; /* Error message color */
            font-size: 0.9em; /* Smaller font size for error messages */
        }
    </style>

<div class="form-container">
        <h2 class="text-center">Daftar Akun Guru</h2>
        <form action="<?php echo site_url('auth/register'); ?>" method="post" onsubmit="return validateForm();">
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
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>
        <p class="text-center mt-3">Sudah punya akun? <a href="<?php echo site_url('auth/login'); ?>">Login disini</a></p>
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
    </script>