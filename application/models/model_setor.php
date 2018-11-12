<?php

class model_setor extends CI_Model {

    public function select($idUser) {
        $sql = "select s.* from setor as s ";
        $sql .= "inner join empresa as e on e.id = s.idEmpresa ";
        $sql .= "inner join user_has_empresa as u on u.idEmpresa = e.id ";
        $sql .= "inner join usuario as o on o.id = u.idUsuario ";
        $sql .= "where u.idUsuario = $idUser ";
        $sql .= "group by s.nome";
        return $this->db->query($sql)->result();
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

    public function findNome($idUser, $idEmpresa) {
        $sql = "select s.id, s.nome from setor as s ";
        $sql.= "inner join empresa as e on e.id = s.idEmpresa ";
        $sql.= "inner join user_has_empresa as u on u.idUsuario = e.id ";
        $sql.= "where e.id = $idEmpresa and u.idUsuario = $idUser group by s.nome ";
        $resultado = array($this->db->query($sql));
        return $resultado->result();
    }

}
