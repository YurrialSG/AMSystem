<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_funcionario', 'funcionariosM');
        $this->load->model('model_empresa', 'empresasM');
        $this->load->model('model_endereco', 'enderecosM');
        $this->load->model('model_setor', 'setoresM');
        $this->load->model('model_funcao', 'funcoesM');
    }

    public function verica_sessao() {
        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function index() {
        $this->verica_sessao();
        redirect(base_url('funcionario/pagina'));
    }

    public function pagina() {
        $this->verica_sessao();
        $dados['funcionarios'] = $this->funcionariosM->select($this->session->id);
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $dados['funcoes'] = $this->funcoesM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('manut_funcionarios', $dados);
    }

    public function open_new_funcionarios() {
        $dados['empresas'] = $this->empresasM->select($this->session->id);
        $this->load->view('include/inc_header.php');
        $this->load->view('include/inc_navbarAdmin.php');
        $this->load->view('include/inc_menuAdmin.php');
        $this->load->view('crud/cad_funcionario', $dados);
    }

    public function getSetores() {
        $idEmpresa = $this->input->post('idEmpresa');
        print "<script type=\"text/javascript\">alert('Some text');</script>";
        $nomeSetores = $this->setoresM->findNome($this->session->id, $idEmpresa);
        if (count($nomeSetores) > 0) {
            $set_select_box = '';
            $set_select_box .= '<option value="">Selecionar Setor</option>';
            foreach ($nomeSetores as $setor) {
                $set_select_box .='<option value="' . $setor->id . '">' . $setor->nome . '</option>';
            }
            echo json_encode($set_select_box);
        }
    }

    public function incluir() {
        $dados = $this->input->post();
        $data = $this->input->post('dataNascimento');
        $dados['dataNascimento'] = date('Y-m-d', strtotime($data));
        $dados['status'] = 1;
        $realizou = $this->funcionariosM->insert($dados);

        if ($realizou) {
            $tipo = "1";
            $mensa .= "Cadastro realizado com sucesso!";
        } else {
            $tipo = "0";
            $mensa .= "Cadastro não efetuado.";
        }
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('funcionario/pagina'));
    }

    public function alterar($id) {
        $dados['empresas'] = $this->empresasM->select();
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
