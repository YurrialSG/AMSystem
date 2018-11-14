<?php

class model_infoAcidente extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM `infoacidente`";
        return $this->db->query($sql)->result();
    }

    public function insert($dados) {
        $this->db->insert('infoacidente', $dados);
        return $this->db->insert_id();
    }

}
