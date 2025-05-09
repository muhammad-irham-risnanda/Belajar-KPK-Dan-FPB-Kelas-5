<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function count_siswa($search_query = null)
    {
        if ($search_query) {
            $this->db->like('nama', $search_query);
        }
        return $this->db->count_all_results('siswa');
    }

    public function get_siswa($limit, $offset, $search_query = null)
    {
        if ($search_query) {
            $this->db->like('nama', $search_query);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('siswa');
        return $query->result();
    }
    public function update_skor($id, $skor)
    {
        $this->db->where('id', $id);
        $this->db->update('siswa', ['skor' => $skor]);
    }

    public function get_siswa_by_id($id)
    {
        return $this->db->get_where('siswa', ['id' => $id])->row();
    }

    public function get_all()
    {
        return $this->db->get('siswa')->result();
    }
}