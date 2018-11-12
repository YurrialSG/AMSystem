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
                <a href="<?= base_url('empresa/open_new_empresas') ?>" class="btn btn-info btn-link">
                    <span class="glyphicon glyphicon-new-window"></span> Adicionar Empresa
                </a>
            </div>
        </div>
        <br />
        <div>
            <span class="badge badge-pill badge-secondary">Lista de Empresas</span>
        </div>
        <br />
        <?php if ($empresas) { ?>
            <table class="table table-hover" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Razão Social</th>
                        <th>Cnpj</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empresas as $empresa) { ?>
                        <tr>
                            <td><?= $empresa->id ?></td>
                            <td><?= $empresa->nome ?></td>
                            <td><?= $empresa->razaoSocial ?></td>
                            <td><?= $empresa->cnpj ?></td>
                            <td>
                                <?php if ($empresa->foto != null) { ?>            
                                    <img src="<?= base_url() . './fotos/' . $empresa->foto ?>" width="120" height="50">
                                <?php } else { ?>
                                    <span class="glyphicon glyphicon-picture"></span>              
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('empresa/alterar/' . $empresa->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                &nbsp;
                                <a href="<?= base_url('empresa/deletar/' . $empresa->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Confirma exclusão do empresa \' <?= $empresa->nome ?> \' ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    <?php } ?>

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