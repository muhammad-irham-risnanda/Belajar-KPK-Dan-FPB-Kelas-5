    <link rel="stylesheet" href="<?php echo base_url('assets/guru/css/new_style.css'); ?>">
    <!-- Include Bootstrap CSS if you're using it -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <header class="bg-primary text-white p-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <a href="<?php echo base_url('index.php/welcome/list_guru'); ?>">
            <img alt="Logo Aplikasi Saya" class="h-50 me-3" src="<?php echo base_url('assets/guru/images/logo-guru.png'); ?>" width="100" />
        </a>
        <button class="btn btn-primary" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <h1 class="h5">Selamat datang, <?php echo $username; ?></h1>
</header>
