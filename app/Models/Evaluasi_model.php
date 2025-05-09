<?php
defined('BASEPATH') or exit('No direct script access allowed');

class evaluasi_model extends CI_Model
{
    public function count_evaluasi($search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        return $this->db->count_all_results('evaluasi');
    }

    public function get_evaluasi($limit, $offset, $search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('evaluasi');
        return $query->result();
    }
    public function get_all()
    {
        return $this->db->get('evaluasi')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('evaluasi', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('evaluasi', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('evaluasi', $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('evaluasi', ['id' => $id]);
    }

    public function insert_result($data)
    {
        return $this->db->insert('siswa_evaluasi', $data);
    }
}
?>