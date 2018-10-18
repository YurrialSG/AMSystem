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
            $this->load->view('indexCliente');
        } else {
            if ($this->session->status == 1) {
                $this->load->view(redirect('admin/cadastro'));
            } if ($this->session->status == 2) {
                $this->load->view(redirect('admin/pagina'));
            } else {
                $this->load->view('include/inc_header.php');
                $this->load->view('indexCliente');
            }
        }
    }

    public function index() {
        $this->verica_sessao();
    }

    public function usuariosAdmin() {
        $dados['usuarios'] = $this->usuariosM->select();
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_usuarios', $dados);
    }

    public function cadastrar() {
        $this->load->view('include/inc_header.php');
        $this->load->view('cadastrarSe');
    }

    public function incluir() {
        $dados = $this->input->post();
        $dados['senha'] = md5($this->input->post('senha'));
        $dados['status'] = 1;
        $realizou = $this->usuariosM->insert($dados);

        if ($realizou) {
            $tipo = "1";
            $mensa .= "Cadastro realizado com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Cadastro não efetuado.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('usuarios/cadastrar'));
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
            $mensa .= "E-mail/Senha inválido.";
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
