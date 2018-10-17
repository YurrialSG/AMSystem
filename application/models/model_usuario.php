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

    public function selectRelat() {
        $sql = "select u.id, u.nome, u.email, u.dataNascimento, u.cpf, u.telefone, u.nivel ";
        $sql .= "from usuario u";
        $query = $this->db->query($sql);
        //result retorna array de dados
        return $query->result();
    }

    public function findCliente($id) {
        $sql = "select * from usuario where id  = $id";
        $query = $this->db->query($sql);
        //retorna o registro obitdo
        return $query->row();
    }

    public function selectGraph() {
        $sql = "SELECT year(datacad) as ano, COUNT(if(cidade='Pelotas', 1, null)) ";
        $sql .= "as num_pel, COUNT(if(cidade<>'Pelotas', 1, null)) ";
        $sql .= "as num_outras from usuarios GROUP BY year(datacad);";
        $query = $this->db->query($sql);
        return $query->result;
    }

    public function findEmail($email) {
        $sql = "select * from usuarios where email = '$email'";
        $query = $this->db->query($sql);
        //retorna o registro obitdo
        return $query->row();
    }

    public function updateSenhaTemporaria($email, $senhaTemporaria) {
        $sql = "UPDATE usuarios SET urlHash = '$senhaTemporaria' WHERE email = '$email'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    public function updateNovaSenha($codigo, $senhaNova) {
        $sql = "UPDATE usuarios SET senha = '$senhaNova' WHERE urlHash = '$codigo'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

}
