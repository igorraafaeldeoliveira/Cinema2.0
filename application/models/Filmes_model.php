<?php

/*
 * @author Igor
 */

class Filmes_model extends CI_Model {

    public function insert($data = array()) {
        $this->db->insert('filme', $data);
        return $this->db->affected_rows();
    }

   public function getALL() {
        $this->db->select('filme.*,statusfilme.tx_descricao,cinema.nomeCinema,classificacao.classificacaoIndicativa');
        $this->db->from('filme'); 
        $this->db->join('statusfilme', 'filme.STATUS=statusfilme.id_status', 'inner');
        $this->db->join('cinema', 'filme.cinema=cinema.id_cinema', 'inner');
        
        $this->db->join('classificacao', 'filme.classificacao=classificacao.id', 'inner');
        $query = $this->db->get();
        return $query->result(); 
    }
      
    public function getOne($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('filme');
        return $query->row(0);
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update('filme', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('filme');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}
