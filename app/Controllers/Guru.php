<?php

namespace App\Controllers;

use App\Models\UserModel; // <-- ini penting
use App\Models\StudentModel;
use App\Models\TimeLimitModel;
use App\Models\KpkModel;
use App\Models\FpbModel;
use App\Models\FaktorPrimaModel;
use App\Models\EvaluasiModel;
use App\Models\SiswaModel;
use App\Models\SiswaFpbModel;
use App\Models\SiswaevaluasiModel;
use App\Models\SiswafaktorprimaModel;
class Guru extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in') || $session->get('role') !== 'guru') {
            return redirect()->to('/guru/login');
        }

        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('guru/guru', [
            'username' => $session->get('username'),
            'role' => $session->get('role'),
            'users' => $users
        ]);
    }

    public function editGuru($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Guru dengan ID $id tidak ditemukan.");
        }

        return view('guru/buat-edit/edit_guru', ['user' => $user]);
    }

    public function updateGuru()
    {
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel = new UserModel();
        $userModel->update($id, $data);
        return redirect()->to('/guru');
    }

    public function deleteGuru($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/guru');
    }

    public function listSiswa()
    {
        $session = session();

        // Ambil data siswa dari model
        $studentModel = new StudentModel();
        $students = $studentModel->findAll();

        // Kirimkan data siswa dan username ke view
        return view('guru/siswa', [
            'students' => $students,
            'username' => $session->get('username'),
        ]);
    }


    public function editSiswa($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);
        if (!$student) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Siswa dengan ID $id tidak ditemukan.");
        }

        return view('guru/buat-edit/edit_siswa', ['student' => $student]);
    }

    public function updateSiswa()
    {
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'class' => $this->request->getPost('class'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $studentModel = new StudentModel();
        $studentModel->update($id, $data);
        return redirect()->to('/guru/siswa');
    }

    public function deleteSiswa($id)
    {
        $studentModel = new StudentModel();
        $studentModel->delete($id);
        return redirect()->to('/guru/siswa');
    }
    // TIME LIMIT CRUD
    public function listTimeLimits()
    {
        $session = session();
        $timeLimitModel = new TimeLimitModel();
        $timeLimits = $timeLimitModel->findAll();

        return view('guru/time_limits', [
            'timeLimits' => $timeLimits,
            'username' => $session->get('username'),
        ]);
    }

    public function createTimeLimit()
    {
        return view('guru/buat-edit/create_time_limit');
    }

    public function storeTimeLimit()
    {
        $timeLimitModel = new TimeLimitModel();

        $data = [
            'time_limit' => $this->request->getPost('time_limit'),
        ];

        $timeLimitModel->insert($data);
        return redirect()->to('/guru/time-limits');
    }

    public function editTimeLimit($id)
    {
        $timeLimitModel = new TimeLimitModel();
        $timeLimit = $timeLimitModel->find($id);

        if (!$timeLimit) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Time limit dengan ID $id tidak ditemukan.");
        }

        return view('guru/buat-edit/edit_time_limit', ['timeLimit' => $timeLimit]);
    }

    public function updateTimeLimit()
    {
        $id = $this->request->getPost('id');
        $data = [
            'time_limit' => $this->request->getPost('time_limit'),
        ];

        $timeLimitModel = new TimeLimitModel();
        $timeLimitModel->update($id, $data);

        return redirect()->to('/guru/time-limits');
    }

    public function deleteTimeLimit($id)
    {
        $timeLimitModel = new TimeLimitModel();
        $timeLimitModel->delete($id);

        return redirect()->to('/guru/time-limits');
    }
    // KPK CRUD
    public function listKpk()
    {
        $session = session();
        $kpkModel = new KpkModel();
        $kpkList = $kpkModel->findAll();

        return view('guru/kpk', [
            'kpkList' => $kpkList,
            'username' => $session->get('username'),
        ]);
    }

    public function createKpk()
    {
        return view('guru/buat-edit/create_kpk');
    }

    public function storeKpk()
    {
        $kpkModel = new KpkModel();

        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];

        $kpkModel->insert($data);
        return redirect()->to('/guru/kpk');
    }

    public function editKpk($id)
    {
        $kpkModel = new KpkModel();
        $kpk = $kpkModel->find($id);

        if (!$kpk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Soal KPK dengan ID $id tidak ditemukan.");
        }

        return view('guru/buat-edit/edit_kpk', ['kpk' => $kpk]);
    }

    public function updateKpk()
    {
        $id = $this->request->getPost('id');
        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];

        $kpkModel = new KpkModel();
        $kpkModel->update($id, $data);

        return redirect()->to('/guru/kpk');
    }

    public function deleteKpk($id)
    {
        $kpkModel = new KpkModel();
        $kpkModel->delete($id);
        return redirect()->to('/guru/kpk');
    }
    public function listFpb()
    {
        $session = session();
        $fpbModel = new \App\Models\FpbModel();
        $fpbList = $fpbModel->findAll();

        return view('guru/fpb', [
            'fpbList' => $fpbList,
            'username' => $session->get('username'),
        ]);
    }

    public function createFpb()
    {
        return view('guru/buat-edit/create_fpb');
    }

    public function storeFpb()
    {
        $fpbModel = new \App\Models\FpbModel();

        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];

        $fpbModel->insert($data);
        return redirect()->to('/guru/fpb');
    }

    public function editFpb($id)
    {
        $fpbModel = new \App\Models\FpbModel();
        $fpb = $fpbModel->find($id);

        if (!$fpb) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Soal FPB dengan ID $id tidak ditemukan.");
        }

        return view('guru/buat-edit/edit_fpb', ['fpb' => $fpb]);
    }

    public function updateFpb()
    {
        $id = $this->request->getPost('id');
        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];

        $fpbModel = new \App\Models\FpbModel();
        $fpbModel->update($id, $data);

        return redirect()->to('/guru/fpb');
    }

    public function deleteFpb($id)
    {
        $fpbModel = new \App\Models\FpbModel();
        $fpbModel->delete($id);
        return redirect()->to('/guru/fpb');
    }
    public function listFaktorPrima()
    {
        $session = session();
        $model = new \App\Models\FaktorPrimaModel();
        $data = $model->findAll();

        return view('guru/faktor-prima', [
            'faktorPrimaList' => $data,
            'username' => $session->get('username'),
        ]);
    }

    public function createFaktorPrima()
    {
        return view('guru/buat-edit/create_faktor_prima');
    }

    public function storeFaktorPrima()
    {
        $model = new \App\Models\FaktorPrimaModel();
        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];
        $model->insert($data);
        return redirect()->to('/guru/faktor-prima');
    }

    public function editFaktorPrima($id)
    {
        $model = new \App\Models\FaktorPrimaModel();
        $soal = $model->find($id);
        if (!$soal) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Soal tidak ditemukan.");
        }
        return view('guru/buat-edit/edit_faktor_prima', ['faktor_prima' => $soal]);
    }

    public function updateFaktorPrima()
    {
        $model = new \App\Models\FaktorPrimaModel();
        $id = $this->request->getPost('id');
        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];
        $model->update($id, $data);
        return redirect()->to('/guru/faktor-prima');
    }

    public function deleteFaktorPrima($id)
    {
        $model = new \App\Models\FaktorPrimaModel();
        $model->delete($id);
        return redirect()->to('/guru/faktor-prima');
    }
    public function listEvaluasi()
    {
        $session = session();
        $model = new \App\Models\EvaluasiModel();
        $data = $model->findAll();

        return view('guru/evaluasi', [
            'evaluasiList' => $data,
            'username' => $session->get('username'),
        ]);
    }

    public function createEvaluasi()
    {
        return view('guru/buat-edit/create_evaluasi');
    }

    public function storeEvaluasi()
    {
        $model = new \App\Models\EvaluasiModel();
        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];
        $model->insert($data);
        return redirect()->to('/guru/evaluasi');
    }

    public function editEvaluasi($id)
    {
        $model = new \App\Models\EvaluasiModel();
        $soal = $model->find($id);
        if (!$soal) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Soal evaluasi tidak ditemukan.");
        }
        return view('guru/buat-edit/edit_evaluasi', ['evaluasi' => $soal]);
    }

    public function updateEvaluasi()
    {
        $model = new \App\Models\EvaluasiModel();
        $id = $this->request->getPost('id');
        $data = [
            'question' => $this->request->getPost('question'),
            'option_a' => $this->request->getPost('option_a'),
            'option_b' => $this->request->getPost('option_b'),
            'option_c' => $this->request->getPost('option_c'),
            'option_d' => $this->request->getPost('option_d'),
            'answer' => $this->request->getPost('answer'),
        ];
        $model->update($id, $data);
        return redirect()->to('/guru/evaluasi');
    }

    public function deleteEvaluasi($id)
    {
        $model = new \App\Models\EvaluasiModel();
        $model->delete($id);
        return redirect()->to('/guru/evaluasi');
    }
    public function nilaiKpk()
    {
        $session = session();
        $siswaModel = new \App\Models\SiswaModel();

        $siswaList = $siswaModel->select('id, nama, kelas, skor')->findAll();

        return view('guru/nilai_kpk', [
            'siswaList' => $siswaList,
            'username' => $session->get('username'),
        ]);
    }

    public function nilaiFpb()
    {
        $session = session();
        $siswaModel = new \App\Models\SiswafpbModel();

        $siswaList = $siswaModel->select('id, nama, kelas, skor')->findAll();

        return view('guru/nilai_fpb', [  // bedain viewnya
            'siswaList' => $siswaList,
            'username' => $session->get('username'),
        ]);
    }
    public function nilaiFaktorPrima()
    {
        $session = session();
        $siswaModel = new \App\Models\SiswafaktorprimaModel();

        $siswaList = $siswaModel->select('id, nama, kelas, skor')->findAll();

        return view('guru/nilai_faktor_prima', [
            'siswaList' => $siswaList,
            'username' => $session->get('username'),
        ]);
    }

    public function nilaiEvaluasi()
    {
        $session = session();
        $siswaModel = new \App\Models\SiswaevaluasiModel();

        $siswaList = $siswaModel->select('id, nama, kelas, skor')->findAll();

        return view('guru/nilai_evaluasi', [
            'siswaList' => $siswaList,
            'username' => $session->get('username'),
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/guru/login');
    }
}
