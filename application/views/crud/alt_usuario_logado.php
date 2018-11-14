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
                swal("Aviso", "<?= $mensa ?>", "info");
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
        width: 450px;
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
        background-repeat: no-repeat;
        background-size: 100%;
    }

    .clash-card__image--barbarian img {
        width: 400px;
        position: absolute;
        top: -65px;
        left: 30px;
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
        <form role="form" method="post" action="<?= base_url('usuario/grava_alteracao') ?>">
            <input type="hidden" name="id" value="<?= $usuarios->id ?>">
            <?php
            $rand = (string) rand(1, 5);
            $image_rand = base_url('icon/imagem' . $rand . '.png');
            ?>
            <br />
            <br />
            <div class="slide-container">
                <div class="wrapper">
                    <div class="clash-card barbarian">
                        <div class="clash-card__image clash-card__image--barbarian">
                            <img src="<?= $image_rand ?>" alt="barbarian" />
                        </div>
                        <div class="clash-card__level clash-card__level--barbarian">AMSystem</div>
                        <div class="clash-card__unit-name">
                            <input type="text" value="<?= $usuarios->nome ?>" name="nome" id="nome" class="form-control input-group-lg" placeholder="Título" style="width: 90%; margin-left: 5%; text-align: center;" tabindex="3" required autofocus >                               
                        </div>
                        <div class="clash-card__unit-description">
                            <span>
                                <input type="text" value="<?= $usuarios->email ?>" name="email" id="email" class="form-control input-group-lg" placeholder="Título" style="width: 90%; margin-left: 5%; text-align: center;" tabindex="3" required autofocus >                               
                            </span>
                        </div>
                        <br />
                        <input type="submit" value="Alterar" style="width: 100%;" class="btn btn-secondary btn-group-sm" tabindex="7">
                    </div> <!-- end clash-card barbarian-->
                </div> <!-- end wrapper -->
            </div>
            <div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <button type="button" id="btn_voltar" class="btn btn-block btn-default btn-circle" style="width: 100%;" onclick="document.location.href = '<?= base_url('usuarios/dados') ?>'"> Voltar</button>
                </div>
            </div>
    </div>
</body>
</html>