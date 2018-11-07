<?php

class model_setor extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('setor')->result();
    }

    public function insert($dados) {
        return $this->db->insert('setor', $dados);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('setor');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('setor', $pegaID);
        return $this->db->affected_rows();
    }

}
