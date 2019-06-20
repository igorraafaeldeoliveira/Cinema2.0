<?php

/*
 * @author Igor
 */

class Cinemas_model extends CI_Model {

    public function insert($data = array()) {
        $this->db->insert('cinema', $data);
        return $this->db->affected_rows();
    }

    public function getALL() {
        $this->db->select('cinema.*');
        $this->db->from('cinema');
        $query = $this->db->get();
        return $query->result();
    }

    public function getOne($id) {
        $this->db->where('id_cinema', $id);
        $query = $this->db->get('cinema');
        return $query->row(0);
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id_cinema', $id);
            $this->db->update('cinema', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id_cinema', $id);
            $this->db->delete('cinema');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
