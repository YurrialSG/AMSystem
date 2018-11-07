<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_usuario', 'usuariosM');
        $this->load->model('model_endereco', 'enderecosM');
        $this->load->model('model_empresa', 'empresasM');
        $this->load->model('model_estado', 'estadosM');
        $this->load->model('model_cidade', 'cidadesM');
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

    public function open_new_usuarios() {
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/cad_usuario');
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

    public function incluirUserLogado() {
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

        redirect(base_url('usuarios/open_new_usuarios'));
    }

    public function deletar($id) {
        if ($this->usuariosM->delete($id)) {
            $tipo = "1";
            $mensa .= "Remoção realizada com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Remoção não efetuada.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('usuarios/usuariosAdmin'));
    }

    public function alterar($id) {
        $this->db->where('id', $id);
        $dados['usuarios'] = $this->db->get('usuario')->row();
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/alt_usuario', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $pegaID['senha'] = md5($this->input->post('senha'));
        $this->db->where('id', $pegaID['id']);

        if ($this->usuariosM->update($pegaID)) {
            $tipo = "1";
            $mensa .= "Alteração realizada com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Alteração não efetuada.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('usuarios/usuariosAdmin'));
    }

    public function cadastroInicial() {
        $estado = $this->input->post('estado');
        $idEstado = $this->estadosM->insert($estado);


        $nomeCidade = $this->input->post('cidade');
        $idCidade = $this->cidadesM->insert($nomeCidade, $idEstado);

        $status = 1;

        $logradouro = $this->input->post('logradouro');
        $numero = $this->input->post('numero');
        $complemento = $this->input->post('complemento');
        $cep = $this->input->post('cep');
        $bairro = $this->input->post('bairro');
        $idEndereco = $this->enderecosM->insert($logradouro, $numero, $complemento, $cep, $bairro, $idCidade, $status);

        $razaoSocial = $this->input->post('razaoSocial');
        $nome = $this->input->post('nome');
        $cnpj = $this->input->post('cnpj');
        $idEmpresa = $this->empresasM->insert($razaoSocial, $nome, $cnpj, $status);

//inserindo Endereço do usuário logado
        if ($this->usuariosM->updateEndereco($this->session->id, $idEndereco) &&
                $this->usuariosM->updateEmpresa($this->session->id, $idEmpresa)) {
            if ($this->usuariosM->updateStatus($this->session->id)) {
                $tipo = "1";
                $mensa .= "Dados cadastrados com sucesso.";
                $this->session->set_flashdata('tipo', $tipo);
                $this->session->set_flashdata('mensa', $mensa);
                $this->load->view(redirect('admin/pagina'));
            }
        } else {
            $tipo = "0";
            $mensa .= "Erro no cadastro das informações.";
            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);
            redirect('usuarios/cadastrar');
        }

//inserindo Empresa do usuário logado
    }

    public function login() {
        $this->load->view('include/inc_header.php');
        $this->load->view('login');
    }

    public function logar() {

        $email = $this->input->post('email');
        $senha = md5($this->input->post('senha'));

        $recaptchaResponse = $this->input->post('g-recaptcha-response');
        $secret = '6LfrOHcUAAAAAKLqXdgThMN08gtddxfvb7TMCWFG';
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data1 = array('secret' => $secret, 'response' => $recaptchaResponse);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $status = json_decode($response, true);

        if ($status['success']) {
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
        } else {
            $tipo = "0";
            $mensa .= "Marcar o campo 'Não sou um robô'.";
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
