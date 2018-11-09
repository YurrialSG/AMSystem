<style>
    /* Credit to bootsnipp.com for the css for the color graph */
    .colorgraph {
        height: 5px;
        border-top: 0;
        background: #c4e17f;
        border-radius: 5px;
        background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }

    input {

    }
</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {

<?php
if ($this->session->has_userdata('mensa')) {
    $mensa = $this->session->flashdata('mensa');
    if ($this->session->flashdata('tipo') == '0') {
        ?>
                swal("Erro", "<?= $mensa ?>", "error");
        <?php
    } else {
        ?>
                swal("Sucesso", "<?= $mensa ?>", "success");
        <?php
    }
}
?>
    });
</script>

<script src="<?= base_url('assets/js/ajax_Cep.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        jQuery(function ($) {
            $("#dataNascimento").mask("99/99/9999", {placeholder: "__/__/____"});
            $("#rg").mask("9999999999");
            $("#cpf").mask("999.999.999-99");
            $("#telefoneRes").mask("(99) 9999-9999");
            $("#telefoneCel").mask("(99) 99999-9999");
            $("#cep").mask("99999-999");
        });
    });
</script>

<div class="container">
    <div class="col-sm-10" style="background-color: white; margin-left: 200px; margin-top: -20px;">

        <div class="row">
            <form role="form" method="post" action="<?= base_url('funcionario/incluir') ?>">
                <h3>Cadastrar <small>Funcionário</small></h3>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-7">
                        <div class="form-group">
                            <input type="text" name="nome" id="display_name" class="form-control input-group-lg" placeholder="Nome" tabindex="3" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="dataNascimento" id="dataNascimento" class="form-control input-group-lg" placeholder="Data de nasc." tabindex="3" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="rg" id="rg" class="form-control input-group-lg" placeholder="RG" tabindex="3" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="cpf" id="cpf" class="form-control input-group-lg" placeholder="CPF" tabindex="3" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-group-lg" placeholder="E-mail" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <span class="badge badge-light">Opcional</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="tel" name="telefoneResidencial" id="telefoneRes" class="form-control input-group-lg" placeholder="Telefone" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <input type="tel" name="telefoneCelular" id="telefoneCel" class="form-control input-group-lg" placeholder="Celular" tabindex="3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="cep" id="cep" class="form-control input-group-lg" placeholder="Cep" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <span id="validation" style="color: #fb3958;"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="logradouro" id="logradouro" class="form-control input-group-lg" placeholder="Rua" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="numero" id="numero" class="form-control input-group-lg" placeholder="Número" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="complemento" id="complemento" class="form-control input-group-lg" placeholder="Complemento" tabindex="3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <input type="text" name="bairro" id="bairro" class="form-control input-group-lg" placeholder="Bairro" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <input type="text" name="cidade" id="cidade" class="form-control input-group-lg" placeholder="Cidade" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="estado" id="estado" class="form-control input-group-lg" placeholder="Estado" tabindex="3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <select name="idEmpresa" id="idEmpresa" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione a empresa... </option>
                            <?php foreach ($empresas as $empresa) { ?>
                                <option value="<?= $empresa->idEmpresa ?>"> <?= $empresa->nome ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <select name="idSetor" id="idSetor" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione o setor... </option>
                            <?php foreach ($setores as $setor) { ?>
                                <option value="<?= $setor->id ?>"> <?= $setor->nome ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-3"><input type="submit" value="Cadastrar" class="btn btn-primary btn-block btn-circle btn-group-sm" tabindex="7"></div>
                    <div class="col-xs-12 col-md-7"></div>
                    <div class="col-xs-12 col-md-2"><a href="<?= base_url('setor') ?>" class="btn btn-default btn-block btn-circle btn-group-sm">Voltar</a></div>
                </div>
            </form>
        </div>
    </div>
</div>