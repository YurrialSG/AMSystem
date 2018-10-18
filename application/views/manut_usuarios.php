<body>
    <div class="col-sm-10" style="background-color: white; margin-left: 200px; margin-top: -20px;">
        <br />
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"> 
                <a href="<? base_url('usuarios/open_new_usuarios') ?>" class="btn btn-info btn-link">
                    <span class="glyphicon glyphicon-new-window"></span> Adicionar Admin
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
                        <td> - </td>
                        <td><?= $usuario->status ?></td>
                        <td>
                            <a href="<? base_url('usuarios/alterar/' . $usuario->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            &nbsp;
                            <a href="<? base_url('usuarios/deletar/' . $usuario->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Deseja excluir o administrador \' <?= $usuario->nome ?> \' ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br />
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <button type="button" id="btn_voltar" class="btn btn-block btn-default" style="width: 100%;" onclick="document.location.href = '<?= base_url('admin') ?>'"> Voltar</button>
            </div>
        </div>
        <br />
    </div>
</body>
</html>