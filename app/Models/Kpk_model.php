<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kpk_model extends CI_Model
{
    public function count_kpk($search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        return $this->db->count_all_results('kpk'); // Assuming 'kpk' is your table name
    }

    public function get_kpk($limit, $offset, $search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('kpk'); // Assuming 'kpk' is your table name
        return $query->result();
    }
    public function get($id)
    {
        return $this->db->get_where('kpk', ['id' => $id])->row();
    }

    public function get_all()
    {
        return $this->db->get('kpk')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('kpk', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kpk', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kpk');
    }
}