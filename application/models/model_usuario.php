<?php

class model_usuario extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('usuario')->result();
    }

    public function verificaUsuario($email, $senha) {
        $sql = "select * from usuario where email=? and senha=? ";
        $query = $this->db->query($sql, array($email, $senha));
        return $query->row();
    }

    public function insert($dados) {
        return $this->db->insert('usuario', $dados);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('usuario');
        return $this->db->affected_rows();
    }

    public function updateEndereco($idUser, $idEndereco) {
        $sql = "UPDATE usuario SET idEndereco='" . $idEndereco . "'";
        $sql .= "WHERE id=$idUser;";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function updateEmpresa($idUser, $idEmpresa) {
        $sql = "UPDATE usuario SET idEmpresa='" . $idEmpresa . "'";
        $sql .= "WHERE id=$idUser;";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function updateStatus($idUser) {
        $sql = "UPDATE usuario SET status= 2 ";
        $sql .= "WHERE id=$idUser;";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function pegarId($emailUser) {
        $sql = "SELECT id FROM usuario WHERE email = $emailUser";
        $query = $this->db->query($sql);
        return $query->row()->id;
    }

}
