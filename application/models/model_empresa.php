<?php

class model_empresa extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('usuario')->result();
    }

    public function insert($razaoSocial, $nome, $cnpj, $status) {
        $sql = "INSERT INTO empresa (razaoSocial, nome, cnpj, status) ";
        $sql .= "VALUES ("
                . "'" . $razaoSocial . "',"
                . "'" . $nome . "',"
                . "'" . $cnpj . "',"
                . "'" . $status . "');";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('usuario');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('usuario', $pegaID);
        return $this->db->affected_rows();
    }

}
