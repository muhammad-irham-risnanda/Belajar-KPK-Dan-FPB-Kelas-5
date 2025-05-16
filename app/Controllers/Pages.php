<?php

namespace App\Controllers;

use App\Models\TimeLimitModel;
use App\Models\StudentModel;
use App\Models\KpkModel;
use App\Models\FpbModel;
use App\Models\FaktorPrimaModel;
use App\Models\EvaluasiModel;

class Pages extends BaseController
{
    protected $studentModel;
    protected $timeLimitModel;
    protected $kpkModel;
    protected $fpbModel;
    protected $faktorPrimaModel;
    protected $evaluasiModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->timeLimitModel = new TimeLimitModel();
        $this->kpkModel = new KpkModel();
        $this->fpbModel = new FpbModel();
        $this->faktorPrimaModel = new FaktorPrimaModel();
        $this->evaluasiModel = new EvaluasiModel();
    }

    public function home()
    {
        if (!session()->get('student_id')) {
            return redirect()->to('auth/login_siswa');
        }
        $data['username'] = session()->get('username');
        return view('student/header')
            . view('student/sidebar')
            . view('student/home', $data)
            . view('student/footer');
    }

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

    public function kpk()
    {
        return view('student/kpk/daftar_view');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $kelas = $this->request->getPost('kelas');
        $password = $this->request->getPost('password');

        // Cek apakah akun ada
        $user = $this->studentModel->login($username, $kelas, $password);

        if ($user) {
            session()->set('student_user_id', $user->id);

            // Simpan data siswa ke tabel siswa (setiap login buat data baru)
            $nama = $user->username;
            $skor = 0;

            $siswa_id = $this->studentModel->saveStudentDataKpk($nama, $kelas, $skor);
            session()->set('siswa_id', $siswa_id);

            return redirect()->to('pages/soal_kpk/1');
        } else {
            session()->setFlashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            return redirect()->to('pages/kpk');
        }
    }

    public function soal_kpk($id)
    {
        if (!session()->get('siswa_id')) {
            return redirect()->to('auth/login');
        }

        $data['time_limit'] = $this->timeLimitModel->getTimeLimit($id);
        if (!$data['time_limit']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $data['kpks'] = $this->kpkModel->findAll();
        if (!$data['kpks']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('student/kpk/soal_view', $data);
    }

    public function submit_soal_kpk()
    {
        if (!session()->get('siswa_id')) {
            return redirect()->to('auth/login');
        }

        $score = 0;
        $questions = $this->kpkModel->findAll();

        foreach ($questions as $question) {
            if ($this->request->getPost('answer_' . $question['id']) !== null) {
                if ($this->request->getPost('answer_' . $question['id']) == $question['answer']) {
                    $score++;
                }
            }
        }

        $siswa_id = session()->get('siswa_id');
        log_message('info', 'Updating score for student ID: ' . $siswa_id . ' with score: ' . $score);

        if ($this->studentModel->updateSkorKpk($siswa_id, $score)) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions);
            return view('student/kpk/hasil_view', $data);
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            return redirect()->to('pages/soal_kpk');
        }
    }

    // Similar methods can be implemented for FPB, Faktor Prima, and Evaluasi
    // Follow the same approach for 'fpb', 'faktor_prima', and 'evaluasi' as the ones above.



    public function fpb_materi()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/materi');
        $this->load->view('student/footer');
    }
    public function fpb_latihan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/latihan');
        $this->load->view('student/footer');
    }
    public function fpb_materi2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/materi2');
        $this->load->view('student/footer');
    }

    public function fpb_latihan2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/latihan2');
        $this->load->view('student/footer');
    }
    public function fpb_materi3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/materi3');
        $this->load->view('student/footer');
    }
    public function fpb_latihan3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/latihan3');
        $this->load->view('student/footer');
    }
    public function video_fpb()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/video');
        $this->load->view('student/footer');
    }

    public function fpb()
    {
        $this->load->view('student/fpb/daftar_view'); // Mengubah nama view sesuai konteks
    }

    public function authenticate_fpb()
    {
        $username = $this->input->post('username');
        $kelas = $this->input->post('kelas');
        $password = $this->input->post('password');

        // Cek apakah akun ada
        $user = $this->Student_model->login($username, $kelas, $password);

        if ($user) {
            // Simpan ID siswa (dari tabel login 'students') ke session jika diperlukan
            $this->session->set_userdata('student_user_id', $user->id);

            // Simpan data siswa ke tabel siswa (setiap login buat data baru)
            $nama = $user->username; // Asumsikan username adalah nama siswa
            $skor = 0; // Set skor awal ke 0

            // Simpan dan dapatkan ID data baru yg dibuat di tabel siswa
            $siswa_id = $this->Student_model->save_student_data_fpb($nama, $kelas, $skor);

            // Simpan ID data siswa yang terbaru di session untuk update skor nanti
            $this->session->set_userdata('siswa_id', $siswa_id);

            redirect('pages/soal_fpb/1'); // Arahkan ke halaman soal KPK
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/fpb');
        }
    }

    public function soal_fpb($id)
    {
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        // Ambil data waktu limit berdasarkan ID
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        if (!$data['time_limit']) {
            show_404();
        }
        // Ambil semua soal KPK
        $data['fpbs'] = $this->Fpb_model->get_all();
        if (!$data['fpbs']) {
            show_404();
        }

        $this->load->view('student/fpb/soal_view', $data);
    }

    public function submit_soal_fpb()
    {
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Fpb_model->get_all();

        foreach ($questions as $question) {
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }
        $siswa_id = $this->session->userdata('siswa_id');
        log_message('info', 'Updating score for student ID: ' . $siswa_id . ' with score: ' . $score);

        if ($this->Student_model->update_skor_fpb($siswa_id, $score)) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions);
            $this->load->view('student/fpb/hasil_view', $data);
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_fpb');
        }
    }

    public function faktor_prima_materi()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/materi');
        $this->load->view('student/footer');
    }

    public function faktor_prima_latihan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/latihan');
        $this->load->view('student/footer');
    }

    public function faktor_prima_materi2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/materi2');
        $this->load->view('student/footer');
    }

    public function faktor_prima_latihan2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/latihan2');
        $this->load->view('student/footer');
    }

    public function video_faktor_prima()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/video');
        $this->load->view('student/footer');
    }

    public function faktor_prima()
    {
        $this->load->view('student/faktor_prima/daftar_view');
    }

    public function authenticate_faktor_prima()
    {
        $username = $this->input->post('username');
        $kelas = $this->input->post('kelas');
        $password = $this->input->post('password');

        // Cek apakah akun ada
        $user = $this->Student_model->login($username, $kelas, $password);

        if ($user) {
            // Simpan ID siswa (dari tabel login 'students') ke session jika diperlukan
            $this->session->set_userdata('student_user_id', $user->id);

            // Simpan data siswa ke tabel siswa (setiap login buat data baru)
            $nama = $user->username; // Asumsikan username adalah nama siswa
            $skor = 0; // Set skor awal ke 0

            // Simpan dan dapatkan ID data baru yg dibuat di tabel siswa
            $siswa_id = $this->Student_model->save_student_data_faktor_prima($nama, $kelas, $skor);

            // Simpan ID data siswa yang terbaru di session untuk update skor nanti
            $this->session->set_userdata('siswa_id', $siswa_id);

            redirect('pages/soal_faktor_prima/1'); // Arahkan ke halaman soal KPK
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/faktor_prima');
        }
    }

    public function soal_faktor_prima($id)
    {
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        // Ambil data waktu limit berdasarkan ID
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        if (!$data['time_limit']) {
            show_404();
        }
        // Ambil semua soal KPK
        $data['faktor_primas'] = $this->Faktor_prima_model->get_all();
        if (!$data['faktor_primas']) {
            show_404();
        }

        $this->load->view('student/faktor_prima/soal_view', $data);
    }

    public function submit_soal_faktor_prima()
    {
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Faktor_prima_model->get_all();

        foreach ($questions as $question) {
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }
        $siswa_id = $this->session->userdata('siswa_id');
        log_message('info', 'Updating score for student ID: ' . $siswa_id . ' with score: ' . $score);

        if ($this->Student_model->update_skor_faktor_prima($siswa_id, $score)) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions);
            $this->load->view('student/faktor_prima/hasil_view', $data);
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_faktor_prima');
        }
    }

    public function evaluasi()
    {
        $this->load->view('student/evaluasi/daftar_view');
    }

    public function authenticate_evaluasi()
    {
        $username = $this->input->post('username');
        $kelas = $this->input->post('kelas');
        $password = $this->input->post('password');

        // Cek apakah akun ada
        $user = $this->Student_model->login($username, $kelas, $password);

        if ($user) {
            // Simpan ID siswa (dari tabel login 'students') ke session jika diperlukan
            $this->session->set_userdata('student_user_id', $user->id);

            // Simpan data siswa ke tabel siswa (setiap login buat data baru)
            $nama = $user->username; // Asumsikan username adalah nama siswa
            $skor = 0; // Set skor awal ke 0

            // Simpan dan dapatkan ID data baru yg dibuat di tabel siswa
            $siswa_id = $this->Student_model->save_student_data_evaluasi($nama, $kelas, $skor);

            // Simpan ID data siswa yang terbaru di session untuk update skor nanti
            $this->session->set_userdata('siswa_id', $siswa_id);

            redirect('pages/soal_evaluasi/1'); // Arahkan ke halaman soal KPK
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/evaluasi');
        }
    }

    public function soal_evaluasi($id)
    {
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        // Ambil data waktu limit berdasarkan ID
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        if (!$data['time_limit']) {
            show_404();
        }
        // Ambil semua soal KPK
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        if (!$data['evaluasis']) {
            show_404();
        }

        $this->load->view('student/evaluasi/soal_view', $data);
    }

    public function submit_soal_evaluasi()
    {
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Evaluasi_model->get_all();

        foreach ($questions as $question) {
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }
        $siswa_id = $this->session->userdata('siswa_id');
        log_message('info', 'Updating score for student ID: ' . $siswa_id . ' with score: ' . $score);

        if ($this->Student_model->update_skor_evaluasi($siswa_id, $score)) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions);
            $this->load->view('student/evaluasi/hasil_view', $data);
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_evaluasi');
        }
    }
}