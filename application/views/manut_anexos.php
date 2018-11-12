<body>
    <div class="col-sm-10" style="margin-left: 200px; margin-top: -20px;">
        <br />
        <table class="table table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Lista de links cadastrados</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Aula 01 - Sistema em desenvolvimento com Firebase</td>
                    <td> 
                        Aula 01 - AMSystem
                        <a href="<? base_url('usuarios/alterar/' . $usuario->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                    <td>        
                        <a href="https://www.facebook.com/" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
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