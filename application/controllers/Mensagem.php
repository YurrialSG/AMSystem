<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagem extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_mensagem', 'mensagensM');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function index() {
        $this->verica_sessao();
        redirect(base_url('mensagem/pagina'));
    }

    public function pagina() {
        $this->verica_sessao();
        $dados['mensagens'] = $this->mensagensM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_mensagem', $dados);
    }

    public function open_new_mensagens() {
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/cad_mensagem');
    }

    public function incluir() {
        $dados = $this->input->post();
        $now = new DateTime();
        $data = $now->format('d/m/Y');
        $dados['data'] = date('Y-m-d', strtotime($data));
        $dados['idUsuario'] = $this->session->id;
        $dados['status'] = 1;
        $realizou = $this->mensagensM->insert($dados);

        if ($realizou) {
            $tipo = "1";
            $mensa .= "Cadastro realizado com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Cadastro não efetuado.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('mensagem/open_new_mensagens'));
    }

    public function alterar($id) {
        $this->db->where('id', $id);
        $dados['mensagem'] = $this->db->get('mensagem')->row();
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/alt_mensagem', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);

        if ($this->mensagensM->update($pegaID)) {
            $tipo = "1";
            $mensa .= "Alteração realizada com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Alteração não efetuada.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('mensagem/pagina'));
    }

    public function deletar($id) {
        if ($this->mensagensM->delete($id)) {
            $tipo = "1";
            $mensa .= "Remoção realizada com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Remoção não efetuada.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('mensagem/pagina'));
    }

}
