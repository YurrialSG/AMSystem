<?php

class model_acidente extends CI_Model {

    public function select($idUser, $idEmpresa) {
        $sql = "select a.* from acidente as a ";
        $sql.= "inner join funcionario as f on f.id = a.idFuncionario ";
        $sql.= "inner join empresa as e on e.id = f.idEmpresa ";
        $sql.= "inner join user_has_empresa as u on u.idEmpresa = e.id ";
        $sql.= "inner join usuario as o on o.id = u.idUsuario ";
        $sql.= "where o.id = $idUser AND e.id = $idEmpresa ";
        $sql.= "group by a.descricao ";
        return $this->db->query($sql)->result();
    }

    public function insert($dados) {
        return $this->db->insert('acidente', $dados);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('acidente');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('acidente', $pegaID);
        return $this->db->affected_rows();
    }

    public function find($idUser, $idEmpresa) {
        $sql = "select s.id, s.nome from setor as s ";
        $sql.= "inner join empresa as e on e.id = s.idEmpresa ";
        $sql.= "inner join user_has_empresa as u on u.idUsuario = e.id ";
        $sql.= "where e.id = $idEmpresa and u.idUsuario = $idUser group by s.nome ";
        $resultado = array($this->db->query($sql));
        return $resultado->result();
    }

}
