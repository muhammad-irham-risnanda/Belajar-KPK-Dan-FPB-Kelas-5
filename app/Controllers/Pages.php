<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('TimeLimit_model');
        $this->load->model('Student_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kpk_model');
        $this->load->model('Siswa_fpb_model');
        $this->load->model('Fpb_model');
        $this->load->model('Siswa_faktor_prima_model');
        $this->load->model('Faktor_prima_model');
        $this->load->model('Siswa_evaluasi_model');
        $this->load->model('Evaluasi_model');
    }

    public function home()
    {
        if (!$this->session->userdata('student_id')) {
            redirect('auth/login_siswa');
        }
        $data['username'] = $this->session->userdata('username');
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/home', $data);
        $this->load->view('student/footer');
    }


    public function tujuan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/tujuan');
        $this->load->view('student/footer');
    }

    public function info()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/pembuat');
        $this->load->view('student/footer');
    }

    public function kpk_materi()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/materi');
        $this->load->view('student/footer');
    }

    public function kpk_latihan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/latihan');
        $this->load->view('student/footer');
    }

    public function kpk_materi2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/materi2');
        $this->load->view('student/footer');
    }

    public function kpk_latihan2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/latihan2');
        $this->load->view('student/footer');
    }

    public function kpk_materi3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/materi3');
        $this->load->view('student/footer');

    }

    public function kpk_latihan3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/latihan3');
        $this->load->view('student/footer');
    }

    public function video_kpk()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/video');
        $this->load->view('student/footer');
    }

    public function kpk()
    {
        $this->load->view('student/kpk/daftar_view');
    }

    public function authenticate()
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
            $siswa_id = $this->Student_model->save_student_data_kpk($nama, $kelas, $skor);

            // Simpan ID data siswa yang terbaru di session untuk update skor nanti
            $this->session->set_userdata('siswa_id', $siswa_id);

            redirect('pages/soal_kpk/1'); // Arahkan ke halaman soal KPK
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/kpk');
        }
    }

    public function soal_kpk($id)
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
        $data['kpks'] = $this->Kpk_model->get_all();
        if (!$data['kpks']) {
            show_404();
        }

        $this->load->view('student/kpk/soal_view', $data);
    }

    public function submit_soal_kpk()
    {
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Kpk_model->get_all();

        foreach ($questions as $question) {
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }
        $siswa_id = $this->session->userdata('siswa_id');
        log_message('info', 'Updating score for student ID: ' . $siswa_id . ' with score: ' . $score);

        if ($this->Student_model->update_skor_kpk($siswa_id, $score)) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions);
            $this->load->view('student/kpk/hasil_view', $data);
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_kpk');
        }
    }


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