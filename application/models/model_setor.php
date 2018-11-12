<?php

class model_setor extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('setor')->result();
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
