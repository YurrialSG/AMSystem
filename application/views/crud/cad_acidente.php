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
    <div class="col-sm-10" style="margin-left: 200px; margin-top: -20px;">

        <div class="row">
            <form role="form" method="post" action="<?= base_url('acidente/incluir') ?>">
                <h3>Cadastrar <small>Acidente</small></h3>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="text" name="descricao" id="descricao" class="form-control input-group-lg" placeholder="Descrição" tabindex="3" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="date" name="data" id="data" class="form-control input-group-lg" placeholder="Data" tabindex="3" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <select name="idEmpresa" id="idEmpresa" class="form-control" required style="width: 100%;">
                            <option value="">Selecione a empresa...</option>
                            <?php foreach ($empresas as $empresa) { ?>
                                <option value="<?= $empresa->id ?>"> <?= $empresa->nome ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <select name="idFuncionario" id="idFuncionario" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione o funcionário... </option>
                            <?php foreach ($funcionarios as $funcionario) { ?>
                                <option value="<?= $funcionario->id ?>"> 
                                    <?php
                                    foreach ($empresas as $empresa) {
                                        if ($empresa->id == $funcionario->idEmpresa) {
                                            ?>
                                            <?= $funcionario->nome ?> (<?= $empresa->nome ?>) </option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <select name="tipoDeRisco" id="tipoDeRisco" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione o tipo de risco... </option>
                            <option value="Risco Físico"> Risco Físico </option>
                            <option value="Risco Químico"> Risco Químico </option>
                            <option value="Risco Biologico"> Risco Biologico </option>
                            <option value="Risco Ergonomico"> Risco Ergonomico </option>
                            <option value="Risco de Acidente"> Risco Acidente </option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <input type="text" name="agente" id="agente" class="form-control input-group-lg" placeholder="Descrição sobre agentes presentes" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <select name="idSetor" id="idSetor" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione o setor... </option>
                            <?php foreach ($setores as $setor) { ?>
                                <option value="<?= $setor->id ?>">
                                    <?php
                                    foreach ($empresas as $empresa) {
                                        if ($empresa->id == $setor->idEmpresa) {
                                            ?>
                                            <?= $setor->nome ?> (<?= $empresa->nome ?>) </option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <select name="tipoDeAfastamento" id="tipoDeAfastamento" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione o tipo de acidente... </option>
                            <option value="Acidente com afastamento"> Acidente COM Afastamento </option>
                            <option value="Acidente sem afastamento"> Acidente SEM Afastamento </option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <input type="number" name="diasAfastamento" id="diasAfastamento" min="0" class="form-control input-group-lg" placeholder="Número" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2">
                        <div class="form-group">
                            <input type="text" name="medicao" id="medicao" class="form-control input-group-lg" placeholder="Medição" tabindex="3">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1">
                        <span class="badge badge-light">Qualitativa fica vazio</span>
                    </div>
                </div>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-3"><input type="submit" value="Cadastrar" class="btn btn-primary btn-block btn-circle btn-group-sm" tabindex="7"></div>
                    <div class="col-xs-12 col-md-7"></div>
                    <div class="col-xs-12 col-md-2"><a href="<?= base_url('acidente') ?>" class="btn btn-default btn-block btn-circle btn-group-sm">Voltar</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>