<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_usuario', 'usuariosM');
        $this->load->model('model_user_has_empresa', 'userEmpresasM');
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

        $this->userEmpresasM->insert($this->session->id, $idEmpresa);

        //inserindo Endereço do usuário logado
        if ($this->usuariosM->updateDadosUser($this->session->id, $idEndereco)) {
            $tipo = "1";
            $mensa .= " ";
            $nomeUsuario = $this->session->nome;
            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);
            $this->session->set_flashdata('nomeUsuario', $nomeUsuario);
            $this->load->view(redirect('admin/pagina'));
        } else {
            $tipo = "0";
            $mensa .= "Erro no cadastro das informações.";
            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);
            redirect('usuarios/cadastrar');
        }
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
                $sessao['email'] = $verifica->email;
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

    public function dados() {
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_usuario', $dados);
    }

    public function gravaAlteracaoSenhaTemporaria() {
        $codigo = $this->input->post('codigo');
        $senhaNova = md5($this->input->post('senha'));

        $realizou = $this->usuariosM->updateNovaSenha($codigo, $senhaNova);

        if ($realizou) {
            $tipo = "1";
            $mensa = "Nova Senha inserida com sucesso!";

            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);

            redirect(base_url('usuarios/login'));
        } else {
            $tipo = "0";
            $mensa = "Não foi possivel cadastrar a Nova Senha.";
            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);

            $this->load->view('include/inc_header.php');
            $this->load->view('esqueceuSenha');
        }
    }

    public function configura() {

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user'] = 'amsystemrh@gmail.com';
        $config['smtp_pass'] = 'Amsystem@2018';
        $config['charset'] = 'utf-8';
        //deve ser aspas dupls ""
        $config['newline'] = "\r\n";
        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
    }

    public function envioEmailRecuperarSenha() {
        //função gerar hash temporária
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
        $caracteres .= $lmai;
        $caracteres .= $num;
        $caracteres .= $simb;
        $len = strlen($caracteres);
        //20 significa o tamanho da hash a ser gerada
        for ($n = 1; $n <= 20; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        $senhaTemporaria = $retorno;

        $email = $this->input->post('email');

        //alterar campo senha temporaria no banco
        $encontrouEmail = $this->usuariosM->findEmail($email);

        if ($encontrouEmail) {
            //antes de enviar o e-mail, será alterado o campo senhaTemporaria na tabela Usuário
            $this->usuariosM->updateSenhaTemporaria($email, $senhaTemporaria);

            //carrega a biblioteca para o envio de e-mails
            $this->load->library('email');

            $assunto = "AMSystem - Solicitação de Nova Senha";

            $senha = "Amsystem@2018";

            $mensagem = "<h2 style='text-align: center;'> AMSystem - Sistema de Gerenciamento de Acidentes</h2>";


            $mensagem .= "<h2 style='color: #E86C8D; text-align: center;'>Recuperação de Senha</h2>";
            $mensagem .= "<h4 style='text-align: center;'>"
                    . "Foi solicitada a recuperação de senha.<br>"
                    . "É necessário que insira o código abaixo na página de renovação de senha."
                    . "</h4>";

            $mensagem .= "<h1 style='color: #4cae4c; text-align: center;'>" . $senhaTemporaria . "</h1>";

            // n1 2 br: converte 'enters' em comandos <br>
            $mensagem .= nl2br($this->input->post('mensagem'));

            $this->configura($senha);

            $this->email->from('amsystemrh@gmail.com', 'AMSystem');
            $this->email->to($email);
            $this->email->subject($assunto);
            $this->email->message($mensagem);

            if ($this->email->send()) {

                $tipo = "1";
                $mensa = "Um e-mail foi enviado ao seu endereço.";

                //define a variavel de sessão com a mensagem a ser exibida e indicação de erro
                $this->session->set_flashdata('tipo', $tipo);
                $this->session->set_flashdata('mensa', $mensa);

                $this->load->view('include/inc_header.php');
                $this->load->view('esqueceuSenha');
            } else {
                print_r($this->email->print_debugger());
            }
        } else {
            $tipo = "0";
            $mensa = "E-mail não foi localizado";

            //define a variavel de sessão com a mensagem a ser exibida e indicação de erro
            $this->session->set_flashdata('tipo', $tipo);
            $this->session->set_flashdata('mensa', $mensa);

            redirect(base_url('usuarios/login'));
        }
    }

}
