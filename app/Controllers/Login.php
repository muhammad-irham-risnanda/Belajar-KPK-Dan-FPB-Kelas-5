<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\StudentModel;

class Login extends BaseController
{
    public function loginGuru()
    {
        return view('login_guru');
    }

    public function authGuru()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => 'guru',
                'logged_in' => true,
            ]);
            return redirect()->to('/guru');
        }

        return redirect()->back()->with('error', 'Login gagal. Cek username/password.');
    }
    public function registerGuru()
    {
        return view('register_guru');
    }

    public function saveGuru()
    {
        $model = new \App\Models\UserModel();

        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Cek apakah username sudah digunakan
        if ($model->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username sudah digunakan.');
        }

        $model->insert([
            'username' => $username,
            'password' => $password
        ]);

        return redirect()->to('/login/guru')->with('success', 'Registrasi berhasil!');
    }



    public function loginSiswa()
    {
        return view('login_siswa');
    }
    public function authSiswa()
    {
        $session = session();
        $studentModel = new StudentModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $class = $this->request->getPost('class');

        $student = $studentModel->where('username', $username)->first();

        if ($student) {
            if (password_verify($password, $student['password']) && $student['class'] === $class) {
                $session->set([
                    'id' => $student['id'],
                    'username' => $student['username'],
                    'class' => $student['class'],
                    'role' => 'siswa',
                    'logged_in' => true,
                ]);
                return redirect()->to('/siswa');
            }
        }

        return redirect()->back()->with('error', 'Login gagal. Username, password, atau kelas salah.');
    }

    public function registerSiswa()
    {
        return view('register_siswa');
    }

    public function saveSiswa()
    {
        $model = new \App\Models\StudentModel();

        $username = $this->request->getPost('username');
        $class = $this->request->getPost('class');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Cek apakah username sudah digunakan
        if ($model->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username sudah digunakan.');
        }

        $model->insert([
            'username' => $username,
            'class' => $class,
            'password' => $password
        ]);

        return redirect()->to('/login/siswa')->with('success', 'Registrasi berhasil!');
    }
    public function logout()
    {
        $role = session()->get('role');
        session()->destroy();

        if ($role === 'guru') {
            return redirect()->to('/login/guru')->with('success', 'Berhasil logout.');
        } elseif ($role === 'siswa') {
            return redirect()->to('/login/siswa')->with('success', 'Berhasil logout.');
        }

        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }

}