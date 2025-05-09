<div class="d-flex flex-grow-1">
    <!-- Sidebar -->
    <div class="sidebar w-20 p-3" id="sidebar">
        <ul class="list-unstyled mt-3">
            <li class="py-2">
                <a class="text-dark d-flex justify-content-between align-items-center" href="#"
                    id="guru_dan_siswaDropdown">
                    Guru Dan Siswa
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="list-unstyled ps-3 hidden" id="guru_dan_siswasMenu">
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/list_guru'); ?>">Guru</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/list_siswa'); ?>">Siswa</a>
                    </li>
                </ul>
            </li>
            <li class="py-2">
                <a class="text-dark d-flex justify-content-between align-items-center" href="#" id="soalsDropdown">
                    Soal
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="list-unstyled ps-3 hidden" id="soalsMenu">
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/waktu'); ?>">Waktu</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/soal_kpk'); ?>">KPK</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/soal_fpb'); ?>">FPB</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/soal_faktor_prima'); ?>">Faktor
                            Prima</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/soal_evaluasi'); ?>">Evaluasi</a>
                    </li>
                </ul>
            </li>
            <li class="py-2">
                <a class="text-dark d-flex justify-content-between align-items-center" href="#" id="nilaisDropdown">
                    Nilai
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="list-unstyled ps-3 hidden" id="nilaisMenu">
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/nilai_kpk'); ?>">KPK</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/nilai_fpb'); ?>">FPB</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/nilai_faktor_prima'); ?>">Faktor Prima</a>
                    </li>
                    <li class="py-2">
                        <a class="text-dark" href="<?php echo site_url('welcome/nilai_evaluasi'); ?>">Evaluasi</a>
                    </li>
                </ul>
            <li class="py-2">
                <a href="<?php echo base_url('index.php/auth/logout'); ?>" class="text-dark"><i
                        class="fas fa-sign-out"></i> Log Out</a>
            </li>
            </li>
        </ul>
    </div>