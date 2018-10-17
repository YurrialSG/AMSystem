<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_usuario', 'usuariosM');
        //configura fuso horário desta classe
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            $this->load->view('include/inc_header.php');
            $this->load->view('include/inc_navbarCli.php');
            $this->load->view('indexCliente');
            $this->load->view('include/inc_footer.php');
        } else {
            if ($this->session->status == 1) {
                $this->load->view(redirect('admin/pagina'));
            } else {
                $this->load->view('include/inc_header.php');
                $this->load->view('include/inc_navbarCli.php');
                $this->load->view('indexCliente');
                $this->load->view('include/inc_footer.php');
            }
        }
    }

    public function index() {
        $this->verica_sessao();
    }

    public function login() {
        $this->load->view('include/inc_header.php');
        $this->load->view('login');
    }

    public function logar() {

        $email = $this->input->post('email');
        $senha = md5($this->input->post('senha'));

        $verifica = $this->usuariosM->verificaUsuario($email, $senha);

        if (isset($verifica)) {
            $sessao['nome'] = $verifica->nome;
            $sessao['id'] = $verifica->id;
            $sessao['status'] = $verifica->status;
            $sessao['logado'] = TRUE;
            $this->session->set_userdata($sessao);
            redirect();
        } else {
            $tipo = "0";
            $mensa .= "E-mail/Senha inválida.";
            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);
            redirect('usuarios/login');
        }
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect();
    }

}
