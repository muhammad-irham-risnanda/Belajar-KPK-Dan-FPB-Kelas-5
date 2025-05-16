<!-- HEAD -->
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- HEADER -->
    <header class="bg-primary text-white py-3 px-4 d-flex justify-content-between align-items-center" style="height: 80px;">
        <div class="d-flex align-items-center gap-3">
            <a href="<?= base_url('index.php/welcome/list_guru'); ?>">
                <img alt="Logo Aplikasi Saya" src="<?= base_url('assets/guru/images/logo-guru.png'); ?>" width="80" />
            </a>
            <button class="btn btn-sm btn-light text-primary" id="toggleSidebar">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <h1 class="h5 m-0">Selamat datang, <?= $username; ?></h1>
    </header>
