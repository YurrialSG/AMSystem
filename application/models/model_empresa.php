<?php

class model_empresa extends CI_Model {

    public function select($id) {
        $sql = "select e.* from empresa as e ";
        $sql .= "inner join user_has_empresa as u on u.idEmpresa = e.id ";
        $sql .= "where idUsuario = $id ";
        $sql .= "group by e.nome";
        return $this->db->query($sql)->result();
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

    public function find($id) {
        $sql = "select u.idEmpresa, e.nome from user_has_empresa as u ";
        $sql .= "inner join empresa as e on u.idEmpresa = e.id ";
        $sql .= "where idUsuario = $id ";
        $sql .= "group by e.nome";
        $this->db->query($sql)->result();
    }

    public function totalReg($id) {
        $sql = "SELECT COUNT(usuario.id) as total from usuario ";
        $sql .= "INNER JOIN user_has_empresa ";
        $sql .= "ON usuario.id = user_has_empresa.idUsuario ";
        $sql .= "where usuario.id = $id ";
        return $this->db->query($sql)->result();
    }

}
