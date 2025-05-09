<?php
defined('BASEPATH') or exit('No direct script access allowed');

class faktor_prima_model extends CI_Model
{
    public function count_faktor_prima($search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        return $this->db->count_all_results('faktor_prima');
    }

    public function get_faktor_prima($limit, $offset, $search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('faktor_prima');
        return $query->result();
    }
    public function get($id)
    {
        return $this->db->get_where('faktor_prima', ['id' => $id])->row();
    }

    public function get_all()
    {
        return $this->db->get('faktor_prima')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('faktor_prima', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('faktor_prima', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('faktor_prima');
    }
}