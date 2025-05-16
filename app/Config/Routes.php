<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::loginSiswa');
$routes->get('/login/guru', 'Login::loginGuru');
$routes->post('/login/auth/guru', 'Login::authGuru');
$routes->get('/login/siswa', 'Login::loginSiswa');
$routes->post('/login/auth/siswa', 'Login::authSiswa');
$routes->get('/logout', 'Login::logout');

$routes->get('/register/siswa', 'Login::registerSiswa');
$routes->post('/register/siswa/save', 'Login::saveSiswa');

$routes->get('/register/guru', 'Login::registerGuru');
$routes->post('/register/guru/save', 'Login::saveGuru');

// app/Config/Routes.php

$routes->get('/guru', 'Guru::index');
$routes->get('/guru/guru', 'Guru::index');
$routes->get('/guru/editGuru/(:segment)', 'Guru::editGuru/$1');
$routes->post('/guru/updateGuru', 'Guru::updateGuru');
$routes->get('/guru/deleteGuru/(:segment)', 'Guru::deleteGuru/$1');

$routes->get('/guru/siswa', 'Guru::listSiswa');
$routes->get('/guru/editSiswa/(:segment)', 'Guru::editSiswa/$1');
$routes->post('/guru/updateSiswa', 'Guru::updateSiswa');
$routes->get('/guru/deleteSiswa/(:segment)', 'Guru::deleteSiswa/$1');

$routes->get('/guru/time-limits', 'Guru::listTimeLimits');
$routes->get('/guru/time-limits/create', 'Guru::createTimeLimit');
$routes->post('/guru/time-limits/store', 'Guru::storeTimeLimit');
$routes->get('/guru/time-limits/edit/(:num)', 'Guru::editTimeLimit/$1');
$routes->post('/guru/time-limits/update', 'Guru::updateTimeLimit');
$routes->get('/guru/time-limits/delete/(:num)', 'Guru::deleteTimeLimit/$1');

$routes->get('/guru/kpk', 'Guru::listKpk');
$routes->get('/guru/kpk/create', 'Guru::createKpk');
$routes->post('/guru/kpk/store', 'Guru::storeKpk');
$routes->get('/guru/kpk/edit/(:num)', 'Guru::editKpk/$1');
$routes->post('/guru/kpk/update', 'Guru::updateKpk');
$routes->get('/guru/kpk/delete/(:num)', 'Guru::deleteKpk/$1');

$routes->get('/guru/fpb', 'Guru::listFpb');
$routes->get('/guru/fpb/create', 'Guru::createFpb');
$routes->post('/guru/fpb/store', 'Guru::storeFpb');
$routes->get('/guru/fpb/edit/(:num)', 'Guru::editFpb/$1');
$routes->post('/guru/fpb/update', 'Guru::updateFpb');
$routes->get('/guru/fpb/delete/(:num)', 'Guru::deleteFpb/$1');

$routes->get('/guru/faktor-prima', 'Guru::listFaktorPrima');
$routes->get('/guru/faktor-prima/create', 'Guru::createFaktorPrima');
$routes->post('/guru/faktor-prima/store', 'Guru::storeFaktorPrima');
$routes->get('/guru/faktor-prima/edit/(:num)', 'Guru::editFaktorPrima/$1');
$routes->post('/guru/faktor-prima/update', 'Guru::updateFaktorPrima');
$routes->get('/guru/faktor-prima/delete/(:num)', 'Guru::deleteFaktorPrima/$1');

$routes->get('/guru/evaluasi', 'Guru::listEvaluasi');
$routes->get('/guru/evaluasi/create', 'Guru::createEvaluasi');
$routes->post('/guru/evaluasi/store', 'Guru::storeEvaluasi');
$routes->get('/guru/evaluasi/edit/(:num)', 'Guru::editEvaluasi/$1');
$routes->post('/guru/evaluasi/update', 'Guru::updateEvaluasi');
$routes->get('/guru/evaluasi/delete/(:num)', 'Guru::deleteEvaluasi/$1');

$routes->get('guru/nilai-kpk', 'Guru::nilaiKpk');
$routes->get('guru/nilai-fpb', 'Guru::nilaiFpb');
$routes->get('guru/nilai-faktor-prima', 'Guru::nilaiFaktorPrima');
$routes->get('guru/nilai-evaluasi', 'Guru::nilaiEvaluasi');

$routes->group('siswa', function ($routes) {

    // Route lain untuk siswa...
    $routes->get('', 'Siswa::index');
    $routes->get('home', 'Siswa::home');
    $routes->get('info', 'Siswa::info');
    $routes->get('tujuan', 'Siswa::tujuan');

    // Materi, Latihan, Video KPK
    $routes->get('materi-kpk', 'Siswa::kpk_materi');
    $routes->get('materi-kpk-2', 'Siswa::kpk_materi2');
    $routes->get('materi-kpk-3', 'Siswa::kpk_materi3');
    $routes->get('latihan-kpk', 'Siswa::kpk_latihan');
    $routes->get('latihan-kpk-2', 'Siswa::kpk_latihan2');
    $routes->get('latihan-kpk-3', 'Siswa::kpk_latihan3');
    $routes->get('video-kpk', 'Siswa::video_kpk');

    // Group route evaluasi agar rapi dan konsisten
    $routes->group('evaluasi', function ($routes) {
        $routes->get('kpk', 'Siswa::evaluasiKpk');
        $routes->post('kpk/submit', 'Siswa::submitKpk');

        $routes->get('fpb', 'Siswa::evaluasiFpb');
        $routes->post('fpb/submit', 'Siswa::submitFpb');

        $routes->get('faktor-prima', 'Siswa::evaluasiFaktorPrima');
        $routes->post('faktor-prima/submit', 'Siswa::submitFaktorPrima');

        $routes->get('umum', 'Siswa::evaluasiUmum');
        $routes->post('umum/submit', 'Siswa::submitEvaluasi');
    });

    // Materi, Latihan, Video FPB
    $routes->get('materi-fpb', 'Siswa::fpb_materi');
    $routes->get('materi-fpb-2', 'Siswa::fpb_materi2');
    $routes->get('materi-fpb-3', 'Siswa::fpb_materi3');
    $routes->get('latihan-fpb', 'Siswa::fpb_latihan');
    $routes->get('latihan-fpb-2', 'Siswa::fpb_latihan2');
    $routes->get('latihan-fpb-3', 'Siswa::fpb_latihan3');
    $routes->get('video-fpb', 'Siswa::video_fpb');

    // Materi, Latihan, Video Faktor Prima
    $routes->get('materi-faktor-prima', 'Siswa::faktor_prima_materi');
    $routes->get('materi-faktor-prima-2', 'Siswa::faktor_prima_materi2');
    $routes->get('latihan-faktor-prima', 'Siswa::faktor_prima_latihan');
    $routes->get('latihan-faktor-prima-2', 'Siswa::faktor_prima_latihan2');
    $routes->get('video-faktor-prima', 'Siswa::video_faktor_prima');
});

