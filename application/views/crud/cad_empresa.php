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

<script type="text/javascript">
    function bs_input_file() {
        $(".input-file").before(
                function () {
                    if (!$(this).prev().hasClass('input-ghost')) {
                        var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name", $(this).attr("name"));
                        element.change(function () {
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function () {
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function () {
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor", "pointer");
                        $(this).find('input').mousedown(function () {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
        );
    }
    $(function () {
        bs_input_file();
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        jQuery(function ($) {
            $("#cnpj").mask("999.999.999-99");
        });
    });
</script>

<div class="container">
    <div class="col-sm-10" style="background-color: white; margin-left: 200px; margin-top: -20px;">

        <div class="row">
            <form role="form" method="post" action="<?= base_url('empresa/incluir') ?>">
                <h3>Cadastrar <small>Empresa</small></h3>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-7">
                        <div class="form-group">
                            <input type="text" name="razaoSocial" id="display_name" class="form-control input-group-lg" placeholder="Razão Social" tabindex="3" required autofocus>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="form-group">
                            <img id="output" style="position: absolute; top: -15px; left: 100px; width: 240px; height: 150px;"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="form-group">
                            <input type="text" name="nome" id="dataNascimento" class="form-control input-group-lg" placeholder="Nome" tabindex="3" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <input type="text" name="cnpj" id="cnpj" class="form-control input-group-lg" placeholder="Cnpj" tabindex="3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*" onchange="loadFile(event)">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-reset" onclick="resetFile()" type="button">Limpar</button>
                                </span>
                            </div>
                            <script>
                                var loadFile = function (event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.style.display = 'block';
                                };
                                function resetFile() {
                                    var imagem = document.getElementById('imagem');
                                    var output = document.getElementById('output');
                                    output.style.display = 'none';
                                    imagem.value = "";
                                }
                            </script>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <span class="badge badge-light">Opcional</span>
                    </div>
                </div>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-3"><input type="submit" value="Cadastrar" class="btn btn-primary btn-block btn-circle btn-group-sm" tabindex="7"></div>
                    <div class="col-xs-12 col-md-7"></div>
                    <div class="col-xs-12 col-md-2"><a href="<?= base_url('empresa') ?>" class="btn btn-default btn-block btn-circle btn-group-sm">Voltar</a></div>
                </div>
            </form>
        </div>
    </div>
</div>