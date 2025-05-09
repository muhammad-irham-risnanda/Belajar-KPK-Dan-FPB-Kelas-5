<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_fpb_model extends CI_Model
{
    public function count_siswa_fpb($search_query = null)
    {
        if ($search_query) {
            $this->db->like('nama', $search_query);
        }
        return $this->db->count_all_results('siswa_fpb');
    }

    public function get_siswa_fpb($limit, $offset, $search_query = null)
    {
        if ($search_query) {
            $this->db->like('nama', $search_query);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('siswa_fpb');
        return $query->result();
    }
    public function update_skor($id, $skor)
    {
        $this->db->where('id', $id);
        $this->db->update('siswa_fpb', ['skor' => $skor]);
    }

    public function get_siswa_by_id($id)
    {
        return $this->db->get_where('siswa_fpb', ['id' => $id])->row();
    }

    public function get_all()
    {
        return $this->db->get('siswa_fpb')->result();
    }
}