<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_empresa', 'empresasM');
        $this->load->model('model_user_has_empresa', 'userEmpresasM');
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
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_empresa', $dados);
    }

    public function open_new_empresas() {
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/cad_empresa');
    }

    public function incluir() {
        $status = 1;
        $razaoSocial = $this->input->post('razaoSocial');
        $nome = $this->input->post('nome');
        $cnpj = $this->input->post('cnpj');

        $config['upload_path'] = base_url() . 'fotos/';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $tipo = "0";
            $mensa = "Erro... Arquivo Inválido ";
        } else {
            $arquivo = $this->upload->data();
            $foto = $arquivo['file_name'];
            $idEmpresa = $this->empresasM->insert($razaoSocial, $nome, $cnpj, $foto, $status);
            $realizou = $this->userEmpresasM->insert($this->session->id, $idEmpresa);

            if ($realizou) {
                $tipo = "1";
                $mensa .= "Cadastro realizado com sucesso!";
            } else {
                $tipo = "0";
                $mensa .= "Cadastro não efetuado.";
            }
        }

        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);
        redirect(base_url('empresa/pagina'));
    }

    public function alterar($id) {
        $this->db->where('id', $id);
        $dados['empresas'] = $this->db->get('empresa')->row();
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/alt_empresa', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);

        if ($this->empresasM->update($pegaID)) {
            $tipo = "1";
            $mensa .= "Alteração realizada com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Alteração não efetuada.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('empresa/pagina'));
    }

    public function deletar($id) {
        $verifica_erro = $this->db->_error_number() == 1451;
        if ($this->empresasM->delete($id) == $verifica_erro) {
            $tipo = "0";
            $mensa .= "Remoção não efetuada.";
        } else {
            $tipo = "1";
            $mensa .= "Remoção realizada com sucesso!";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('empresa/pagina'));
    }

}
