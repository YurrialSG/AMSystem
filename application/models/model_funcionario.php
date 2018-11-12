<?php

class model_funcionario extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('funcionario')->result();
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
