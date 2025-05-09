<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeLimit_model extends CI_Model {

    public function insert_time_limit($data) {
        $this->db->insert('time_limits', $data);
    }

    public function get_time_limit($id) {
        return $this->db->get_where('time_limits', ['id' => $id])->row();
    }

    public function get_all() {
        return $this->db->get('time_limits')->result();
    }

    public function update_time_limit($id, $data) {
        $this->db->update('time_limits', $data, ['id' => $id]);
    }

    public function delete_time_limit($id) {
        $this->db->delete('time_limits', ['id' => $id]);
    }
}