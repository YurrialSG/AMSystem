<?php

class model_mensagem extends CI_Model {

    public function select($id) {
        $sql = "select m.*, u.nome from mensagem as m ";
        $sql.= "inner join usuario as u on u.id = m.idUsuario ";
        $sql.= "where u.id = $id ";
        $sql.= "group by m.id";
        return $this->db->query($sql)->result();
    }

    public function insert($dados) {
        return $this->db->insert('mensagem', $dados);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('mensagem');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('mensagem', $pegaID);
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
        $sql = "SELECT COUNT(mensagem.id) as total from mensagem ";
        $sql.= "INNER JOIN usuario ON usuario.id = mensagem.idUsuario ";
        $sql.= "where usuario.id = $id ";
        return $this->db->query($sql)->result();
    }

}
