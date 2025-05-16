<?php

namespace App\Controllers;

use App\Models\TimeLimitModel;
use App\Models\StudentModel;
use App\Models\SiswafaktorprimaModel;
use App\Models\KpkModel;
use App\Models\SiswaModel;
use App\Models\FpbModel;
use App\Models\SiswaFpbModel;
use App\Models\FaktorPrimaModel;
use App\Models\EvaluasiModel;
use App\Models\SiswaevaluasiModel;
class Siswa extends BaseController
{
    protected $studentModel;
    protected $timeLimitModel;
    protected $kpkModel;
    protected $siswaModel;
    protected $fpbModel;
    protected $siswaFpbModel;
    protected $faktorPrimaModel;
    protected $siswaFaktorprimaModel;
    protected $evaluasiModel;
    protected $siswaevaluasiModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->timeLimitModel = new TimeLimitModel();
        $this->kpkModel = new KpkModel();
        $this->siswaModel = new SiswaModel();
        $this->fpbModel = new FpbModel();
        $this->siswaFpbModel = new SiswaFpbModel();
        $this->faktorPrimaModel = new FaktorPrimaModel();
        $this->siswaFaktorPrimaModel = new SiswafaktorprimaModel();
        $this->evaluasiModel = new EvaluasiModel();
        $this->evaluasiModel = new EvaluasiModel();
        $this->siswaevaluasiModel = new SiswaevaluasiModel();

    }
    public function index()
    {
        // Pastikan pengguna sudah login dan memiliki peran 'siswa'
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        // Data untuk ditampilkan di tampilan
        $data = [
            'username' => $session->get('username'),
            'class' => $session->get('class'),
            'role' => $session->get('role')
        ];

        // Menampilkan halaman utama siswa dengan header, sidebar, home, dan footer
        return view('student/header')
            . view('student/sidebar')
            . view('student/home', $data)
            . view('student/footer');
    }
    public function Home()
    {
        return $this->index();
    }

    // Dalam Controller Siswa
    public function tujuan()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/tujuan')
            . view('student/footer');
    }

    public function info()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/pembuat')
            . view('student/footer');
    }
    // KPK Methods
    public function kpk_materi()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/kpk/materi')
            . view('student/footer');
    }

    public function kpk_latihan()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/kpk/latihan')
            . view('student/footer');
    }

    public function kpk_materi2()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/kpk/materi2')
            . view('student/footer');
    }

    public function kpk_latihan2()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/kpk/latihan2')
            . view('student/footer');
    }

    public function kpk_materi3()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/kpk/materi3')
            . view('student/footer');
    }

    public function kpk_latihan3()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/kpk/latihan3')
            . view('student/footer');
    }

    public function video_kpk()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/kpk/video')
            . view('student/footer');
    }
    public function evaluasiKpk()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        // 1. ambil seluruh soal lalu acak
        $questions = $this->kpkModel->findAll();
        shuffle($questions);

        // 2. ambil batas waktu dari DB (contoh: kolom `jenis = kpk`)
        $timeLimitRow = $this->timeLimitModel->first();
        $timeLimit = $timeLimitRow ? (int) $timeLimitRow['time_limit'] : 10; // default 10 menit


        // 3. simpan waktu selesai di session agar tetap konsisten saat refresh
        $expiresAt = time() + $timeLimit;          // waktu selesai (UNIX timestamp)
        $session->set('kpk_exam_expires', $expiresAt);

        return view('student/kpk/evaluasi_kpk', [
            'questions' => $questions,
            'timeLimit' => $timeLimit, // dalam menit
        ]);
    }

    public function submitKpk()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        // Buang field CSRF agar tidak ikut dihitung
        $post = $this->request->getPost();
        unset($post[csrf_token()]);          // hapus elemen 'csrf_test_name'

        $correct = 0;
        $total = 0;

        foreach ($post as $id => $choice) {
            $total++;

            // Ambil soal berdasarkan id field (name radio)
            $question = $this->kpkModel->find($id);

            if ($question && strtolower($question['answer']) === strtolower($choice)) {
                $correct++;
            }
        }

        $score = $total ? round(($correct / $total) * 100) : 0;
        $this->siswaModel->insert([
            'nama' => $session->get('username'),
            'kelas' => $session->get('class'),
            'skor' => $score,
        ]);

        // tampilkan hasil
        return view('student/kpk/evaluasi_kpk_result', [
            'correct' => $correct,
            'total' => $total,
            'score' => $score,
        ]);
    }
    public function fpb_materi()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/fpb/materi')
            . view('student/footer');
    }

    public function fpb_latihan()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/fpb/latihan')
            . view('student/footer');
    }

    public function fpb_materi2()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/fpb/materi2')
            . view('student/footer');
    }

    public function fpb_latihan2()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/fpb/latihan2')
            . view('student/footer');
    }

    public function fpb_materi3()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/fpb/materi3')
            . view('student/footer');
    }

    public function fpb_latihan3()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/fpb/latihan3')
            . view('student/footer');
    }

    public function video_fpb()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/fpb/video')
            . view('student/footer');
    }
    public function evaluasiFpb()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        // Ambil & acak soal
        $questions = $this->fpbModel->findAll();
        shuffle($questions);

        // Ambil time‑limit (menit) — satu baris saja
        $timeLimitRow = $this->timeLimitModel->first();
        $timeLimit = $timeLimitRow ? (int) $timeLimitRow['time_limit'] : 10;

        // Simpan waktu habis ke session
        $expiresAt = time() + ($timeLimit * 60);   // simpan dalam detik!
        $session->set('fpb_exam_expires', $expiresAt);

        return view('student/fpb/evaluasi_fpb', [
            'questions' => $questions,
            'timeLimit' => $timeLimit  // menit
        ]);
    }

    public function submitFpb()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        // Ambil semua input kecuali token CSRF
        $post = $this->request->getPost();
        unset($post[csrf_token()]);

        $correct = 0;
        $total = 0;

        foreach ($post as $id => $choice) {
            $total++;
            $question = $this->fpbModel->find($id);

            if ($question && strtolower($question['answer']) === strtolower($choice)) {
                $correct++;
            }
        }

        $score = $total ? round(($correct / $total) * 100) : 0;

        // Simpan skor ke tabel siswa_fpb
        $this->siswaFpbModel->insert([
            'nama' => $session->get('username'),
            'kelas' => $session->get('class'),
            'skor' => $score,
        ]);

        return view('student/fpb/evaluasi_fpb_result', [
            'correct' => $correct,
            'total' => $total,
            'score' => $score,
        ]);
    }
    public function faktor_prima_materi()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/faktor_prima/materi')
            . view('student/footer');
    }

    public function faktor_prima_latihan()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/faktor_prima/latihan')
            . view('student/footer');
    }

    public function faktor_prima_materi2()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/faktor_prima/materi2')
            . view('student/footer');
    }

    public function faktor_prima_latihan2()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/faktor_prima/latihan2')
            . view('student/footer');
    }

    public function video_faktor_prima()
    {
        return view('student/header')
            . view('student/sidebar')
            . view('student/faktor_prima/video')
            . view('student/footer');
    }
    public function evaluasiFaktorPrima()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        // Ambil & acak soal
        $questions = $this->faktorPrimaModel->findAll();
        shuffle($questions);

        // Ambil batas waktu (menit)
        $timeLimitRow = $this->timeLimitModel->first();
        $timeLimit = $timeLimitRow ? (int) $timeLimitRow['time_limit'] : 10;

        // Simpan waktu selesai di session
        $expiresAt = time() + ($timeLimit * 60);
        $session->set('faktorprima_exam_expires', $expiresAt);

        return view('student/faktor_prima/evaluasi_faktor_prima', [
            'questions' => $questions,
            'timeLimit' => $timeLimit
        ]);
    }
    public function submitFaktorPrima()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        $post = $this->request->getPost();
        unset($post[csrf_token()]);

        $correct = 0;
        $total = 0;

        foreach ($post as $id => $choice) {
            $total++;
            $question = $this->faktorPrimaModel->find($id);

            if ($question && strtolower($question['answer']) === strtolower($choice)) {
                $correct++;
            }
        }

        $score = $total ? round(($correct / $total) * 100) : 0;

        $this->siswaFaktorPrimaModel->insert([
            'nama' => $session->get('username'),
            'kelas' => $session->get('class'),
            'skor' => $score,
        ]);

        return view('student/faktor_prima/evaluasi_faktor_prima_result', [
            'correct' => $correct,
            'total' => $total,
            'score' => $score,
        ]);
    }
    public function evaluasiUmum()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        $questions = $this->evaluasiModel->findAll();
        shuffle($questions);

        $timeLimitRow = $this->timeLimitModel->first();
        $timeLimit = $timeLimitRow ? (int) $timeLimitRow['time_limit'] : 10;

        $session->set('umum_exam_expires', time() + ($timeLimit * 60));

        return view('student/evaluasi/evaluasi_umum', [
            'questions' => $questions,
            'timeLimit' => $timeLimit,
        ]);
    }


    public function submitEvaluasi()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'siswa') {
            return redirect()->to('/siswa/login');
        }

        $post = $this->request->getPost();
        unset($post[csrf_token()]);

        $correct = 0;
        $total = 0;

        foreach ($post as $id => $choice) {
            $total++;
            $question = $this->evaluasiModel->find($id);

            if ($question && strtolower($question['answer']) === strtolower($choice)) {
                $correct++;
            }
        }

        $score = $total ? round(($correct / $total) * 100) : 0;

        // Simpan skor ke tabel siswa_evaluasi
        $this->siswaevaluasiModel->insert([
            'nama' => $session->get('username'),
            'kelas' => $session->get('class'),
            'skor' => $score,
        ]);

        return view('student/evaluasi/evaluasi_umum_result', [
            'correct' => $correct,
            'total' => $total,
            'score' => $score,
        ]);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/siswa');
    }
}