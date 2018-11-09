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

<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,700,900);

    .slide-container {
        margin: auto;
        width: 600px;
        text-align: center;
    }

    .wrapper {
        padding-top: 15px;
        padding-bottom: 40px;
    }
    .wrapper:focus {
        outline: 0;
    }

    .clash-card {
        background: white;
        width: 300px;
        display: inline-block;
        margin: auto;
        border-radius: 19px;
        position: relative;
        text-align: center;
        box-shadow: -1px 15px 30px -12px black;
        z-index: 9999;
    }

    .clash-card__image {
        position: relative;
        height: 243px;
        margin-bottom: 35px;
        border-top-left-radius: 14px;
        border-top-right-radius: 14px;
    }

    .clash-card__image--barbarian {
        background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/barbarian-bg.jpg");
    }

    .clash-card__image--barbarian img {
        width: 400px;
        position: absolute;
        top: -65px;
        left: -70px;
    }

    .clash-card__level {
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .clash-card__level--barbarian {
        color: #EC9B3B;
    }

    .clash-card__unit-name {
        font-size: 16px;
        color: black;
        font-weight: 900;
        margin-bottom: 5px;
    }

    .clash-card__unit-description {
        padding: 10px;
        margin-bottom: 5px;
    }
</style>

<script type="text/javascript">

</script>

<body>
    <div class="col-sm-10" style="margin-left: 200px; margin-top: -20px;">
        <?php
        $rand = (string) rand(1, 5);
        $image_rand = base_url('icon/imagem' . $rand . '.png');
        ?>
        <br />
        <div class="row">
            <div class="col-sm-9"></div>
            <div class="col-sm-3"> 
                <a href="<?= base_url('empresa/open_new_empresas') ?>" class="btn btn-info btn-link">
                    <span class="glyphicon glyphicon-edit"></span> Alterar Dados Pessoais
                </a>
            </div>
        </div>
        <div class="slide-container">
            <div class="wrapper">
                <div class="clash-card barbarian">
                    <div class="clash-card__image clash-card__image--barbarian">
                        <img src="<?= $image_rand ?>" alt="barbarian" />
                    </div>
                    <div class="clash-card__level clash-card__level--barbarian">AMSystem</div>
                    <div class="clash-card__unit-name"><?= $this->session->nome ?></div>
                    <div class="clash-card__unit-description">
                        <?php foreach ($empresas as $empresa) { ?>     
                            <span><?= $empresa->nome ?><br /></span>
                        <?php } ?> 
                        <br />
                        <span><?= $this->session->email ?></span>
                    </div>
                </div> <!-- end clash-card barbarian-->
            </div> <!-- end wrapper -->
        </div>
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <button type="button" id="btn_voltar" class="btn btn-block btn-default btn-circle" style="width: 100%;" onclick="document.location.href = '<?= base_url('admin') ?>'"> Voltar</button>
            </div>
        </div>
    </div>
</body>
</html>