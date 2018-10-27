<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function buscaCep() {
        $cep = $_POST["cep"];
        $linha = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

        $dados["sucesso"] = (string) $linha->resultado;
        $dados["rua"] = (string) $linha->tipo_logradouro . " " . $linha->logradouro;
        $dados["bairro"] = (string) $linha->bairro;
        $dados["cidade"] = (string) $linha->cidade;
        $dados["estado"] = (string) $linha->uf;

        echo json_encode($dados);
    }

}
