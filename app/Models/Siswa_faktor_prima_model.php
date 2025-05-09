<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_faktor_prima_model extends CI_Model {
    public function count_siswa_faktor_prima($search_query = null)
    {
        if ($search_query) {
            $this->db->like('nama', $search_query);
        }
        return $this->db->count_all_results('siswa_faktor_prima');
    }

    public function get_siswa_faktor_prima($limit, $offset, $search_query = null)
    {
        if ($search_query) {
            $this->db->like('nama', $search_query);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('siswa_faktor_prima');
        return $query->result();
    }

    public function update_skor($id, $skor)
    {
        $this->db->where('id', $id);
        $this->db->update('siswa_faktor_prima', ['skor' => $skor]);
    }

    public function get_siswa_by_id($id)
    {
        return $this->db->get_where('siswa_faktor_prima', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('siswa_faktor_prima')->result();
    }
}