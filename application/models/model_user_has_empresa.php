<?php

class model_user_has_empresa extends CI_Model {

    public function insert($idUser, $idEmpresa) {
        $sql = "INSERT INTO user_has_empresa (idEmpresa, idUsuario) ";
        $sql.= "VALUES ('" . $idEmpresa . "','" . $idUser . "');";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_has_empresa');
        return $this->db->affected_rows();
    }

}
