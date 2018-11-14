<?php

class model_acidente extends CI_Model {

    public function select($idUser) {
        $sql = "select a.* from acidente as a ";
        $sql.= "inner join empresa e on e.id = a.idEmpresa ";
        $sql.= "inner join user_has_empresa u on u.idEmpresa = e.id ";
        $sql.= "inner join usuario o on o.id = u.idUsuario ";
        $sql.= "where o.id = $idUser ";
        return $this->db->query($sql)->result();
    }

    public function filtrarPorEmpresa($idEmpresa) {
        $sql = "SELECT * FROM `acidente` WHERE `idEmpresa` = $idEmpresa";
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

//    ATENÇÃO ARRUMAR BUSCA DOS GRAFICOS COM DADOS DO USUARIO LOGADO

    public function selectGraph01($idUser) {
        $sql = "select s.nome as nomeSetor, count(i.id) as num ";
        $sql.= "from infoacidente i inner join setor s on s.id = i.idSetor ";
        $sql.= "inner join empresa e on e.id = s.idEmpresa ";
        $sql.= "inner join user_has_empresa u on u.idEmpresa = e.id ";
        $sql.= "inner join usuario o on o.id = u.idUsuario ";
        $sql.= "where o.id = $idUser ";
        $sql.= "group by s.nome ";
        $query = $this->db->query($sql);
        //result retorna array de dados
        return $query->result();
    }

    public function selectGraph02($idUser) {
        $sql = "select e.nome as nomeEmpresa, count(a.id) as num ";
        $sql.= "from acidente a inner join empresa e on e.id = a.idEmpresa ";
        $sql.= "inner join user_has_empresa u on u.idEmpresa = e.id ";
        $sql.= "inner join usuario o on o.id = u.idUsuario ";
        $sql.= "where o.id = $idUser ";
        $sql.= "group by e.nome ";
        $query = $this->db->query($sql);
        //result retorna array de dados
        return $query->result();
    }

    public function totalReg($id) {
        $sql = "SELECT COUNT(acidente.id) as total from acidente ";
        $sql.= "INNER JOIN funcionario ON funcionario.id = acidente.idFuncionario ";
        $sql.= "INNER JOIN empresa ON empresa.id = funcionario.idEmpresa ";
        $sql.= "INNER JOIN user_has_empresa ON user_has_empresa.idEmpresa = empresa.id ";
        $sql.= "INNER JOIN usuario ON usuario.id = user_has_empresa.idUsuario ";
        $sql.= "where usuario.id = $id ";
        return $this->db->query($sql)->result();
    }

}
