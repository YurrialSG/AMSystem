<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_empresa', 'empresasM');
        $this->load->model('model_funcionario', 'funcionariosM');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function index() {
        $this->verica_sessao();
        redirect(base_url('admin/pagina'));
    }

    public function cadastro() {
        $this->verica_sessao();

        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdminCad.php');
        $this->load->view('cadastroInicial');
    }

    public function pagina() {
        $this->verica_sessao();
        $dados['totalEmpresa'] = $this->empresasM->totalReg($this->session->id);
        $dados['totalFuncionario'] = $this->funcionariosM->totalReg($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('indexAdmin', $dados);
    }

}
