<link href="<?= base_url('assets/css/signin.css') ?>" rel="stylesheet">
<script>
    $(document).ready(function () {
        $(".menuRecuperarSenha").hide();

        $("#recuperarSenha-Link").click(function () {
            $(".menuRecuperarSenha").fadeIn(300);
        });

        $("#cancelar").click(function () {
            $(".menuRecuperarSenha").fadeOut(200);
        });

<?php
if ($this->session->has_userdata('mensa')) {
    $mensa = $this->session->flashdata('mensa');
    if ($this->session->flashdata('tipo') == '1') {
        ?>
                $(".alert-success").delay(10000).fadeIn();
                $(".alert-success").fadeOut(100);
    <?php } else { ?>
                $(".alert-danger").delay(10000).fadeIn();
                $(".alert-danger").fadeOut(100);
        <?php
    }
}
?>

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        jQuery(function ($) {
            $("#dataNascimento").mask("99/99/9999", {placeholder: "__/__/____"});
            $("#cpf").mask("999.999.999-99");
            $("#telefone").mask("(99) 9999-9999");
        });
    });
</script>

<style>
    .form-style-6{
        font: 95% Arial, Helvetica, sans-serif;
        max-width: 400px;
        margin: 0px auto;
        padding: 0px;
        background: white;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
    }
    .form-style-6 #titulo{
        background: #43D1AF;
        padding: 20px 0;
        font-size: 140%;
        font-weight: 300;
        width: 100%;
        text-align: center;
        color: #fff;
        margin: -5px 0px 0px 0px;
    }
    .form-style-6 input[type="text"],
    .form-style-6 input[type="date"],
    .form-style-6 input[type="datetime"],
    .form-style-6 input[type="email"],
    .form-style-6 input[type="number"],
    .form-style-6 input[type="search"],
    .form-style-6 input[type="password"],
    .form-style-6 input[type="time"],
    .form-style-6 input[type="url"],
    .form-style-6 textarea,
    .form-style-6 select 
    {
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;
        outline: none;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        background: #fff;
        margin-bottom: 4%;
        border: 1px solid #ccc;
        padding: 3%;
        color: #555;
        font: 95% Arial, Helvetica, sans-serif;
    }
    .form-style-6 input[type="text"]:focus,
    .form-style-6 input[type="date"]:focus,
    .form-style-6 input[type="datetime"]:focus,
    .form-style-6 input[type="email"]:focus,
    .form-style-6 input[type="number"]:focus,
    .form-style-6 input[type="search"]:focus,
    .form-style-6 input[type="time"]:focus,
    .form-style-6 input[type="url"]:focus,
    .form-style-6 textarea:focus,
    .form-style-6 select:focus
    {
        box-shadow: 0 0 5px #43D1AF;
        padding: 3%;
        border: 1px solid #43D1AF;
    }

    .form-style-6 input[type="submit"]{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        padding: 3%;
        background: #43D1AF;
        border-bottom: 2px solid #30C29E;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;    
        color: #fff;
    }

    .form-style-6 input[type="button"]{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        padding: 3%;
        background: #4cae4c;
        border-bottom: 2px solid #4cae4c;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;    
        color: #fff;
    }


    .form-style-6 input[type="submit"]:hover{
        background: #2EBC99;
    }

    .form-style-6 input[type="button"]:hover{
        background: #5cb85c;
    }

    .form-style-6 #cadastrar-se {
        -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
        -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
        box-shadow: inset 0px 1px 0px 0px #45D6D6;
        background-color: #2CBBBB;
        border: 1px solid #27A0A0;
        display: inline-block;
        cursor: pointer;
        color: #FFFFFF;
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 14px;
        padding: 8px 18px;
        text-decoration: none;
        text-transform: uppercase;
    }

    .form-style-6 #recuperarSenha {
        width: 100%;
        padding-top: 5px;
        cursor: pointer;
        text-align: right;
    }

    .form-style-6 #cadastrar-se:hover {
        background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
        background-color:#34CACA;
    }


    .form-RecuperarSenha {
        font-family: 'Lato', sans-serif;
        text-align: center;
    }


    form {
        padding-top: 10px;
        width: 450px;
        margin: 0 auto;
        text-align: center;
    }


    .header {
        font-size: 35px;
        text-transform: uppercase;
        letter-spacing: 5px;
    }


    .description {
        font-size: 14px;
        letter-spacing: 1px;
        line-height: 1.3em;
        margin: -2px 0 25px;

    }


    .input {
        display: flex;
        align-items: center;
    }


    .button {
        height: 44px;
        border: none;
    }


    #email {
        width: 75%;
        background: #FDFCFB;
        font-family: inherit;
        color: #737373;
        letter-spacing: 1px;
        text-indent: 5%;
        border-radius: 5px 0 0 5px;
    }


    #submit {
        width: 25%;
        height: 46px;
        background: #E86C8D;
        font-family: inherit;
        font-weight: bold;
        color: inherit;
        letter-spacing: 1px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        transition: background .3s ease-in-out;
    }

    #cancelar {
        width: 100%;
        cursor: pointer;
        text-align: right;
    }


    #submit:hover {
        background: #d45d7d;
    }


    input:focus {
        outline: none;
        outline: 2px solid #E86C8D;
        box-shadow: 0 0 2px #E86C8D;
    }


</style>

<body>

    <div class="container">

        <?php
        if ($this->session->has_userdata('mensa')) {

            $mensa = $this->session->flashdata('mensa');
            if ($this->session->flashdata('tipo') == '1') {

                echo '<div class="alert alert-success" style="text-align:center;">';
                echo'<strong>Ok! </strong>' . $mensa;
                echo' </div>';
            } else {
                echo '<div class="alert alert-danger" style="text-align:center;">';
                echo '<strong>Erro! </strong>' . $mensa;
                echo' </div>';
            }
        }
        ?>

        <br>

        <div class="form-style-6">
            <input type="button" id="titulo" onclick="document.location.href = '<?= base_url() ?>'" value="Login"/>
            <form class="form-signin" method="post" action="<?= base_url('usuarios/logar') ?>">
                <input type="email" name="email" placeholder="E-mail de Acesso" required autofocus/>
                <input type="password" name="senha" placeholder="Senha" required/>
                <p>
                    <input type="submit" value="Entrar" />
                </p>
                <p>
                    <input type="button" onclick="document.location.href = '<?= base_url() ?>'" value="Voltar" />
                </p>
                <p class="help-block" id="recuperarSenha">
                    <a id="recuperarSenha-Link">Esqueceu sua senha?</a>
                </p>
            </form>
        </div>
    </div>

    <div class="menuRecuperarSenha">
        <form action="<?= base_url('usuarios/envioEmailRecuperarSenha') ?>" method="post" name="Form inicial para recuperar a senha">
            <p class="help-block" id="cancelar">
                <a id="cancelar">
                    <span style="color: #27A0A0">C</span>
                    <span style="color: #2CBBBB">A</span>
                    <span style="color: #27A0A0">N</span>
                    <span style="color: #2CBBBB">C</span>
                    <span style="color: #27A0A0">E</span>
                    <span style="color: #2CBBBB">L</span>
                    <span style="color: #27A0A0">A</span>
                    <span style="color: #2CBBBB">R</span>
                </a>
            </p>
            <div class="header">
                <p>Recuperar Senha</p>
            </div>
            <div class="description">
                <p>
                    Para recuperar sua senha é necessário que insira o seu e-mail e logo 
                    <span style="text-decoration: underline;"> será enviado um E-MAIL para você</span>.
                </p>
            </div>
            <div class="input">
                <input type="text" class="button" id="email" name="email" placeholder="SEU E-MAIL">
                <input type="submit" class="button" id="submit" value="RECUPERAR">
            </div>
        </form>
    </div>

</body>
</html>