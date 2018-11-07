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

<div class="container">
    <div class="col-sm-10" style="background-color: white; margin-left: 200px; margin-top: -20px;">

        <div class="row">
            <form role="form" method="post" action="<?= base_url('setor/grava_alteracao') ?>">
                <input type="hidden" name="id" value="<?= $setores->id ?>">
                <h3>Alterar <small>Setor</small></h3>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" value="<?= $setores->nome ?>" class="form-control input-group-lg" placeholder="Nome" tabindex="3" required autofocus>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <select name="idEmpresa" id="idEmpresa" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione a empresa... </option>
                            <?php foreach ($empresas as $empresa) { ?>
                                <option value="<?= $empresa->id ?>" <?= $empresa->id == $setores->idEmpresa ? 'selected' : '' ?> > <?= $empresa->nome ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-3"><input type="submit" value="Alterar" class="btn btn-warning btn-block btn-circle btn-group-sm" tabindex="7"></div>
                    <div class="col-xs-12 col-md-7"></div>
                    <div class="col-xs-12 col-md-2"><a href="<?= base_url('setor') ?>" class="btn btn-default btn-block btn-circle btn-group-sm">Voltar</a></div>
                </div>
            </form>
        </div>
    </div>
</div>