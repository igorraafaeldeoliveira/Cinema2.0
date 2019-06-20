<?php

class Funcionarios_model extends CI_Model {

    public function insert($data = array()) {
        $this->db->insert('funcionarios', $data);
        return $this->db->affected_rows();
    }

    public function getALL() {
        $this->db->select('funcionarios.*,cinema.nomeCinema');
        $this->db->from('funcionarios'); 
        $this->db->join('cinema','funcionarios.cd_cinema=cinema.id_cinema', 'inner');
        $query = $this->db->get();
        return $query->result(); 
    }

    public function getOne($id) {
        $this->db->where('id_funcionario', $id);
        $query = $this->db->get('funcionarios');
        return $query->row(0);
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id_funcionario', $id);
            $this->db->update('funcionarios', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id_funcionario', $id);
            $this->db->delete('funcionarios');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}
