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

    public function update($pegaID) {
        $this->db->update('usuario', $pegaID);
        return $this->db->affected_rows();
    }

    public function updateDadosUser($pegaID, $idEndereco) {
        $sql = "UPDATE usuario SET "
                . "idEndereco = '$idEndereco', "
                . "status = 2 "
                . "WHERE id = '$pegaID'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function findEmail($email) {
        $sql = "select * from usuario where email = '$email'";
        $query = $this->db->query($sql);
        //retorna o registro obitdo
        return $query->row();
    }

    public function updateSenhaTemporaria($email, $senhaTemporaria) {
        $sql = "UPDATE usuario SET hashTemporaria = '$senhaTemporaria' WHERE email = '$email'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function updateNovaSenha($codigo, $senhaNova) {
        $sql = "UPDATE usuario SET senha = '$senhaNova' WHERE hashTemporaria = '$codigo'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

}
