<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acidente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_acidente', 'acidentesM');
        $this->load->model('model_infoAcidente', 'infoaciM');
        $this->load->model('model_empresa', 'empresasM');
        $this->load->model('model_funcionario', 'funcionariosM');
        $this->load->model('model_setor', 'setoresM');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function index() {
        $this->verica_sessao();
        redirect(base_url('acidente/pagina'));
    }

    public function pagina() {
        $this->verica_sessao();
        $dados['acidentes'] = '';
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_acidentes', $dados);
    }

    public function open_registros() {
        $idEmpresa = $this->input->post('idEmpresa');
        $realizou = $dados['acidentes'] = $this->acidentesM->filtrarPorEmpresa($idEmpresa);
        if ($realizou) {
            $dados['infoAci'] = $this->infoaciM->select();
            $dados['funcionarios'] = $this->funcionariosM->select($this->session->id);
        } else {
            $dados['acidentes'] = '';
        }
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_acidentes', $dados);
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
