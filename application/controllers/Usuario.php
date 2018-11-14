<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_usuario', 'usuariosM');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function alterar($id) {
        $this->verica_sessao();
        $this->db->where('id', $id);
        $dados['usuarios'] = $this->db->get('usuario')->row();
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $tipo = "1";
        $mensa = "Ao realizar a alteração você será deslogado do sistema!";
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);
        $this->load->view('crud/alt_usuario_logado', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);

        if ($this->usuariosM->update($pegaID)) {
            $tipo = "1";
            $mensa .= "Alteração realizada com sucesso!";
            $this->session->sess_destroy();
            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);
            redirect(base_url('usuarios/login'));
        } else {
            $tipo = "0";
            $mensa .= "Alteração não efetuada.";
        }
    }

    public function deletar($id) {
        if ($this->setoresM->delete($id)) {
            $tipo = "1";
            $mensa .= "Remoção realizada com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Remoção não efetuada.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('setor/pagina'));
    }

}
