<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

    public function register($data)
    {
        return $this->db->insert('students', $data);
    }

    public function login($username, $class, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('class', $class);
        $query = $this->db->get('students');

        if ($query->num_rows() == 1) {
            $student = $query->row();
            if (password_verify($password, $student->password)) {
                return $student;
            }
        }
        return false;
    }

    public function get_students($search = '', $limit = 0, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('students');
        if (!empty($search)) {
            $this->db->like('username', $search);
            $this->db->or_like('class', $search);
        }
        $this->db->limit($limit, $offset); // Tambahkan limit dan offset untuk pagination
        $query = $this->db->get();
        return $query->result();
    }

    public function count_students($search = '')
    {
        if (!empty($search)) {
            $this->db->like('username', $search);
            $this->db->or_like('class', $search);
        }
        return $this->db->count_all_results('students'); // Hitung total siswa berdasarkan pencarian
    }

    public function get_student_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('students')->row();
    }

    public function update_student($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }

    public function delete_student($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('students');
    }

    public function student_exists($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('students');
        return $query->num_rows() > 0;
    }

    public function save_student_data_kpk($nama, $kelas, $skor)
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        $this->db->insert('siswa', $data);
        // Return inserted ID so controller can store it in session
        return $this->db->insert_id();
    }

    public function update_skor_kpk($siswa_id, $skor)
    {
        $this->db->where('id', $siswa_id);
        return $this->db->update('siswa', ['skor' => $skor]);
    }

    public function save_student_data_fpb($nama, $kelas, $skor)
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        $this->db->insert('siswa_fpb', $data);
        // Return inserted ID so controller can store it in session
        return $this->db->insert_id();
    }

    public function update_skor_fpb($siswa_id, $skor)
    {
        $this->db->where('id', $siswa_id);
        return $this->db->update('siswa_fpb', ['skor' => $skor]);
    }

    public function save_student_data_faktor_prima($nama, $kelas, $skor)
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        $this->db->insert('siswa_faktor_prima', $data);
        // Return inserted ID so controller can store it in session
        return $this->db->insert_id();
    }

    public function update_skor_faktor_prima($siswa_id, $skor)
    {
        $this->db->where('id', $siswa_id);
        return $this->db->update('siswa_faktor_prima', ['skor' => $skor]);
    }

    public function save_student_data_evaluasi($nama, $kelas, $skor)
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        $this->db->insert('siswa_evaluasi', $data);
        // Return inserted ID so controller can store it in session
        return $this->db->insert_id();
    }

    public function update_skor_evaluasi($siswa_id, $skor)
    {
        $this->db->where('id', $siswa_id);
        return $this->db->update('siswa_evaluasi', ['skor' => $skor]);
    }
}