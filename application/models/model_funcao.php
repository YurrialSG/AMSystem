<?php

class model_funcao extends CI_Model {

    public function select($idUser) {
        $sql = "select f.* from funcao as f ";
        $sql .= "inner join setor as s on s.id = f.idSetor ";
        $sql .= "inner join empresa as e on e.id = s.idEmpresa ";
        $sql .= "inner join user_has_empresa as u on u.idEmpresa = s.idEmpresa ";
        $sql .= "inner join usuario as o on o.id = u.idUsuario ";
        $sql .= "where o.id = $idUser ";
        $sql .= "group by f.descricao";
        return $this->db->query($sql)->result();
    }

    public function insert($dados) {
        return $this->db->insert('funcionario', $dados);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('funcionario');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('funcionario', $pegaID);
        return $this->db->affected_rows();
    }

    public function totalReg($id) {
        $sql = "SELECT COUNT(funcionario.id) as total from funcionario ";
        $sql.= "INNER JOIN user_has_empresa ON funcionario.idEmpresa = user_has_empresa.idEmpresa ";
        $sql.= "INNER JOIN usuario ON user_has_empresa.idUsuario = usuario.id ";
        $sql .= "where usuario.id = $id ";
        return $this->db->query($sql)->result();
    }

}
