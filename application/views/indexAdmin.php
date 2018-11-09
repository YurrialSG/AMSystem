<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {

<?php
if ($this->session->has_userdata('mensa')) {
    $mensa = $this->session->flashdata('mensa');
    $nomeUsuario = $this->session->flashdata('nomeUsuario');
    if ($this->session->flashdata('tipo') == '0') {
        ?>
                swal("Erro", "<?= $mensa ?>", "error");
        <?php
    } else {
        ?>
                swal("Bem Vindo(a)", "<?= $nomeUsuario ?>", "success");
    <?php }
} ?>
    });
</script>
<style>
    body{
        background-color: white;
    }

    #quadroProduto{
        background-color: white;
        text-align: center;
    }

    #foto{
        padding: 5px;
        padding-bottom: 15px;
    }

    #textos{
        text-align: center;
    }

    #menuMeio{
        padding-top: 10px;
        padding-bottom: 30px;
        padding-left: 60px;
        padding-right: 60px;
    }
</style>

<body>

</body>
</html>