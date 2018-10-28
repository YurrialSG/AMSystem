<?php

class model_endereco extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('usuario')->result();
    }

    public function insert($logradouro, $numero, $complemento, $cep, $bairro, $idCidade, $status) {
        $sql = "INSERT INTO endereco (logradouro, numero, complemento, cep, bairro, idCidade, status) ";
        $sql .= "VALUES ("
                . "'" . $logradouro . "',"
                . "'" . $numero . "',"
                . "'" . $complemento . "',"
                . "'" . $cep . "',"
                . "'" . $bairro . "',"
                . "'" . $idCidade . "',"
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
