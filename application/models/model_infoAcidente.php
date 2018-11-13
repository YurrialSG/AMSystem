<?php

class model_infoAcidente extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM `infoacidente`";
        return $this->db->query($sql)->result();
    }

}
