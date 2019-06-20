<?php

/*
 * @author Igor
 */

class Status_model extends CI_Model {

    public function insert($data = array()) {
        $this->db->insert('statusfilme', $data);
        return $this->db->affected_rows();
    }

   public function getALL() {
   
        $query = $this->db->get('statusfilme');
        return $query->result(); 
    }
      
    public function getOne($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('statusfilme');
        return $query->row(0);
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update('statusfilme', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('statusfilme');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}
