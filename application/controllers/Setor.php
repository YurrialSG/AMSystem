<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_setor', 'setoresM');
        $this->load->model('model_empresa', 'empresasM');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function index() {
        $this->verica_sessao();
        redirect(base_url('setor/pagina'));
    }

    public function pagina() {
        $this->verica_sessao();
        $dados['setores'] = $this->setoresM->select($this->session->id);
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_setores', $dados);
    }

    public function open_new_setores() {
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/cad_setor', $dados);
    }

    public function incluir() {
        $dados = $this->input->post();
        $dados['status'] = 1;
        $realizou = $this->setoresM->insert($dados);

        if ($realizou) {
            $tipo = "1";
            $mensa .= "Cadastro realizado com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Cadastro não efetuado.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('setor/open_new_setores'));
    }

    public function alterar($id) {
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->db->where('id', $id);
        $dados['setores'] = $this->db->get('setor')->row();
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/alt_setor', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);

        if ($this->setoresM->update($pegaID)) {
            $tipo = "1";
            $mensa .= "Alteração realizada com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Alteração não efetuada.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('setor/pagina'));
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
