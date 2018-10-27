<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_empresa', 'empresasM');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function index() {
        $this->verica_sessao();
        redirect(base_url('empresa/pagina'));
    }

    public function incluirEmpresa() {
        $dados = $this->input->post();
        $dados['status'] = 1;
        $this->empresasM->insert($dados);
    }

    public function pagina() {
        $this->verica_sessao();

        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('indexAdmin');
    }

}
