<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function register($data)
    {
        return $this->db->insert('users', $data);
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }

    public function search_users($keyword, $limit, $offset)
    {
        $this->db->like('username', $keyword);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_users($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function count_users()
    {
        return $this->db->count_all('users');
    }
    public function get_all_users()
    {
        $query = $this->db->get('users'); // Mengambil semua data dari tabel 'students'
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function user_exists($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
}