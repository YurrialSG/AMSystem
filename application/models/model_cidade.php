<?php

class model_cidade extends CI_Model {

    public function insert($nome, $idEstado) {
        $sql = "INSERT INTO cidade (nome, idEstado) ";
        $sql .= "VALUES ("
                . "'" . $nome . "',"
                . "'" . $idEstado . "');";
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
