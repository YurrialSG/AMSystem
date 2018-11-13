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
                <a href="<?= base_url('funcionario/open_new_funcionarios') ?>" class="btn btn-info btn-link">
                    <span class="glyphicon glyphicon-new-window"></span> Adicionar Funcionário
                </a>
            </div>
        </div>
        <br />
        <div>
            <span class="badge badge-pill badge-secondary">Lista de Funcionários</span>
        </div>
        <br />
        <?php if ($funcionarios) { ?>
            <table class="table table-hover" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data nasc.</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Setor</th>
                        <th>Empresa</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionarios as $funcionario) { ?>
                        <tr>
                            <td><?= $funcionario->nome ?></td>
                            <td><?= date_format(date_create($funcionario->dataNascimento), 'd/m/Y') ?></td>
                            <td><?= $funcionario->rg ?></td>
                            <td><?= $funcionario->cpf ?></td>
                            <?php
                            foreach ($funcoes as $funcao) {
                                if ($funcao->id == $funcionario->idFuncao) {
                                    ?>     
                                    <td><?= $funcao->descricao ?></td>
                                    <?php
                                }
                            }
                            ?>  
                            <?php
                            foreach ($empresas as $empresa) {
                                if ($empresa->id == $funcionario->idEmpresa) {
                                    ?>     
                                    <td><?= $empresa->nome ?></td>
                                    <?php
                                }
                            }
                            ?>  
                            <td>
                                <a href="<?= base_url('funcionario/alterar/' . $funcionario->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                &nbsp;
                                <a href="<?= base_url('funcionario/deletar/' . $funcionario->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Confirma exclusão do funcionário \' <?= $funcionario->nome ?> \' ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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