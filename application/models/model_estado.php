<?php

class model_estado extends CI_Model {

    public function insert($estadoSigla) {
        $sql = "INSERT INTO estado (sigla) ";
        $sql .= "VALUES ("
                . "'" . $estadoSigla . "');";
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
