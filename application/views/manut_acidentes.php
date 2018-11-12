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

<body>
    <div class="col-sm-10" style="margin-left: 200px; margin-top: -20px;">
        <br />
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"> 
                <a href="<?= base_url('acidente/open_new_acidentes') ?>" class="btn btn-info btn-link">
                    <span class="glyphicon glyphicon-new-window"></span> Adicionar Acidente
                </a>
            </div>
        </div>
        <div>
            <span class="badge badge-pill badge-secondary">Registro de Acidentes</span>
        </div>
        <br />
        <div class="row">
            <form role="form" method="post" action="<?= base_url('acidente/open_registros') ?>">
                <div class="col-xs-5 col-sm-4 col-md-4">
                    <select name="idEmpresa" id="idEmpresa" class="form-control" required style="width: 100%;">
                        <option value=""> Selecione a empresa... </option>
                        <?php foreach ($empresas as $empresa) { ?>
                            <option value="<?= $empresa->id ?>"> <?= $empresa->nome ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <input type="submit" value="Buscar Registros" class="btn btn-info btn-block btn-group-sm" tabindex="7">
                    </div>
                </div>
            </form>
        </div>
        <br />
        <?php if (count($acidentes) < 0) { ?>
            <table class="table table-hover" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descricao</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acidentes as $acidente) { ?>
                        <tr>
                            <td><?= $acidente->id ?></td>
                            <td><?= $acidente->descricao ?></td>
                    <a href = "<?= base_url('acidente/alterar/' . $acidente->id) ?>" class = "btn btn-warning btn-xs"><span class = "glyphicon glyphicon-pencil" aria-hidden = "true"></span></a>
                    &nbsp;
                    <a href = "<?= base_url('acidente/deletar/' . $acidente->id) ?>" class = "btn btn-danger btn-xs" onclick = "return confirm('Confirma exclusão do acidente \' <?= $acidente->descricao ?> \' ?')"><span class = "glyphicon glyphicon-trash" aria-hidden = "true"></span></a>
                    </td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-info">
                <strong>Aviso!</strong> Nenhum registro foi encontrado.
            </div>
            <br />
        <?php } ?>
        <br />
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <button type="button" id="btn_voltar" class="btn btn-block btn-default btn-circle" style="width: 100%;" onclick="document.location.href = '<?= base_url('admin') ?>'"> Voltar</button>
            </div>
        </div>
        <br />
    </div>
</body>
</html>