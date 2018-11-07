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
    <?php }
}
?>
    });
</script>

<body>
    <div class="col-sm-10" style="background-color: white; margin-left: 200px; margin-top: -20px;">
        <br />
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"> 
                <a href="<?= base_url('usuarios/open_new_usuarios') ?>" class="btn btn-info btn-link">
                    <span class="glyphicon glyphicon-new-window"></span> Adicionar Usuários
                </a>
            </div>
        </div>
        <br />
        <table class="table table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome Completo</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->nome ?></td>
                        <td><?= $usuario->email ?></td>
                        <td>
                            <span class="glyphicon glyphicon-eye-close"></span>              
                        </td>
                        <td>
                            <?php if ($usuario->status == '1') { ?>
                                <span class="glyphicon glyphicon-cog"></span>              
                            <?php } else if ($usuario->status == '2') { ?>
                                <span class="glyphicon glyphicon-user"></span>  
                            <?php } else { ?>
                                <span class="glyphicon glyphicon-lock"></span>              
    <?php } ?>
                        </td>
                        <td>
                            <a href="<?= base_url('usuarios/alterar/' . $usuario->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            &nbsp;
                            <a href="<?= base_url('usuarios/deletar/' . $usuario->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Confirma exclusão do usuário \' <?= $usuario->nome ?> \' ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
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