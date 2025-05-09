<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fpb_model extends CI_Model
{
    public function count_fpb($search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        return $this->db->count_all_results('fpb'); // Assuming 'fpb' is your table name
    }

    public function get_fpb($limit, $offset, $search_query = null)
    {
        if ($search_query) {
            $this->db->like('question', $search_query);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('fpb'); // Assuming 'fpb' is your table name
        return $query->result();
    }
    public function get($id)
    {
        return $this->db->get_where('fpb', ['id' => $id])->row();
    }

    public function get_all()
    {
        return $this->db->get('fpb')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('fpb', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('fpb', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('fpb');
    }
}