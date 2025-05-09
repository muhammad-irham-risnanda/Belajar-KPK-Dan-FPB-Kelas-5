<body class="d-flex h-100">
    <div id="sidebar" class="sidebar">
        <div class="p-4">
            <div class="d-flex align-items-center">
                <img alt="Logo of My App" class="h-50 me-3"
                    src="<?php echo base_url('assets/images/logo-siswa.png'); ?>" width="150" />
            </div>
            <ul class="list-unstyled mt-4">
                <li class="py-2"><a href="<?php echo base_url('index.php/pages/home'); ?>" class="text-white"><i
                            class="fas fa-home"></i> Home</a></li>
                <li class="py-2">
                    <button id="materiButton" class="btn btn-link text-white w-100 text-left"><i
                            class="fas fa-book"></i> Materi</button>
                    <ul id="materiSubmenu" class="submenu bg-gray-700 mt-2 rounded">
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/kpk_materi'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> KPK</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/fpb_materi'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> FPB</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/faktor_prima_materi'); ?>"
                                class="text-white"><i class="fas fa-fingerprint"></i> Faktor Prima</a></li>
                    </ul>
                </li>
                <li class="py-2">
                    <button id="latihanButton" class="btn btn-link text-white w-100 text-left"><i
                            class="fas fa-book"></i> Latihan</button>
                    <ul id="latihanSubmenu" class="submenu bg-gray-700 mt-2 rounded">
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/kpk_latihan'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> KPK</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/fpb_latihan'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> FPB</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/faktor_prima_materi'); ?>"
                                class="text-white"><i class="fas fa-fingerprint"></i> Faktor Prima</a></li>
                    </ul>
                </li>            
                <li class="py-2">
                    <button id="videoButton" class="btn btn-link text-white w-100 text-left"><i
                            class="fas fa-book"></i> Video</button>
                    <ul id="videoSubmenu" class="submenu bg-gray-700 mt-2 rounded">
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/video_kpk'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> KPK</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/video_fpb'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> FPB</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/video_faktor_prima'); ?>"
                                class="text-white"><i class="fas fa-fingerprint"></i> Faktor Prima</a></li>
                    </ul>
                </li>
                <li class="py-2">
                    <button id="quizButton" class="btn btn-link text-white w-100 text-left"><i
                            class="fas fa-book"></i> Quiz</button>
                    <ul id="quizSubmenu" class="submenu bg-gray-700 mt-2 rounded">
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/kpk'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> KPK</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/fpb'); ?>"
                                class="text-white"><i class="fas fa-calculator"></i> FPB</a></li>
                        <li class="py-2"><a href="<?php echo base_url('index.php/pages/faktor_prima'); ?>"
                                class="text-white"><i class="fas fa-fingerprint"></i> Faktor Prima</a></li>
                    </ul>
                </li>
                <li class="py-2"><a href="<?php echo base_url('index.php/pages/evaluasi'); ?>" class="text-white"><i
                            class="fas fa-check-circle"></i> Evaluasi</a></li>
                <li class="py-2"><a href="<?php echo base_url('index.php/pages/tujuan'); ?>" class="text-white"><i
                            class="fas fa-bullseye"></i> Tujuan</a></li>
                <li class="py-2"><a href="<?php echo base_url('index.php/pages/info'); ?>" class="text-white"><i
                            class="fas fa-info-circle"></i> Info</a></li>
                <li class="py-2"><a href="<?php echo base_url('index.php/auth/logout_siswa'); ?>" class="text-white"><i
                            class="fas fa-sign-out"></i> Log Out</a></li>
            </ul>
        </div>
    </div>