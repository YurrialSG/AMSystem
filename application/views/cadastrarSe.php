<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />
<link href="<?= base_url('assets/css/signin.css') ?>" rel="stylesheet">

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
} ?>
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        //you have to use keyup, because keydown will not catch the currently entered value
        $('input[type=password]').keyup(function () {

            // set password variable
            var pswd = $(this).val();

            //validate the length
            if (pswd.length < 8) {
                $('#length').removeClass('valid').addClass('invalid');
            } else {
                $('#length').removeClass('invalid').addClass('valid');
            }

            //validate letter
            if (pswd.match(/[A-z]/)) {
                $('#letter').removeClass('invalid').addClass('valid');
            } else {
                $('#letter').removeClass('valid').addClass('invalid');
            }

            //validate uppercase letter
            if (pswd.match(/[A-Z]/)) {
                $('#capital').removeClass('invalid').addClass('valid');
            } else {
                $('#capital').removeClass('valid').addClass('invalid');
            }

            //validate number
            if (pswd.match(/\d/)) {
                $('#number').removeClass('invalid').addClass('valid');
            } else {
                $('#number').removeClass('valid').addClass('invalid');
            }

        }).focus(function () {
            $('#pswd_info').show();
        }).blur(function () {
            $('#pswd_info').hide();
        });

    });
</script>

<style>
    body {
        color: #fff;
        background: linear-gradient(-45deg, white, whitesmoke, #30C29E, whitesmoke);
        background-size: 400% 400%;
        -webkit-animation: Gradient 15s ease infinite;
        -moz-animation: Gradient 15s ease infinite;
        animation: Gradient 15s ease infinite;
    }

    @-webkit-keyframes Gradient {
        0% {
            background-position: 0% 50%
        }
        50% {
            background-position: 100% 50%
        }
        100% {
            background-position: 0% 50%
        }
    }

    @-moz-keyframes Gradient {
        0% {
            background-position: 0% 50%
        }
        50% {
            background-position: 100% 50%
        }
        100% {
            background-position: 0% 50%
        }
    }

    @keyframes Gradient {
        0% {
            background-position: 0% 50%
        }
        50% {
            background-position: 100% 50%
        }
        100% {
            background-position: 0% 50%
        }
    }

    h1,
    h6 {
        font-family: 'Open Sans';
        font-weight: 300;
        text-align: center;
        position: absolute;
        top: 45%;
        right: 0;
        left: 0;
    }

    .form-style-6{
        font: 95% Arial, Helvetica, sans-serif;
        max-width: 800px;
        width: 500px;
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
    .form-style-6 input[type="password"]:focus,
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
        padding: 3%;
        background: #43D1AF;
        border-bottom: 2px solid #30C29E;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;    
        color: #fff;
        width: 60%;
        margin-left: 8.5%;
    }

    .form-style-6 input[type="button"]{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        padding: 3%;
        background: #4cae4c;
        border-bottom: 2px solid #4cae4c;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;    
        color: #fff;
        width: 30%;
    }


    .form-style-6 input[type="submit"]:hover{
        background: #2EBC99;
    }

    .form-style-6 input[type="button"]:hover{
        background: #5cb85c;
    }

    /* Styles for verification */
    #pswd_info {
        bottom:-95px;
        width: 500px;
        padding: 5px;
        margin-right: 100%;
        margin-left: -100px;
        background: white; 
        font-size:.875em;
        display:none;
        box-shadow: 0 0 5px whitesmoke;
        padding: 3%;
        border: 1px solid whitesmoke;
        margin-top: 2%;
        margin-bottom: 6%;
    }

    #pswd_info h5 {
        margin:0 0 10px 0; 
        padding:0;
        font-weight:normal;
        color: black;
    }

    .invalid {
        background:url(images/invalid.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#ec3f41;
    }
    .valid {
        background:url(images/valid.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#3a7d34;
    }

</style>

<body>

    <div class="col-sm-12">
        <div class="form-style-6">
            <input type="button" id="titulo" onclick="document.location.href = '<?= base_url() ?>'" value="AMSystem"/>
            <form class="form-signin" method="post" action="<?= base_url('usuarios/incluir') ?>">
                <input type="text" name="nome" placeholder="Nome" required autofocus="true"/>
                <input type="email" name="email" placeholder="E-mail" required/>
                <input type="password" id="pswd" name="senha" placeholder="Senha" required/>
                <div id="pswd_info" style="display: none;">
                    <h5>Recomendações para uma senha segura:</h5>
                    <ul>
                        <li id="letter" class="valid">Possuir <strong>1 caracter.</strong></li>
                        <li id="capital" class="invalid">Possuir <strong>1 letra maiúscula.</strong></li>
                        <li id="number" class="invalid">Possuir <strong>1 caracter especial [!@#$%_&].</strong></li>
                        <li id="length" class="invalid">Possuir <strong>no mínimo 8 caracteres.</strong></li>
                    </ul>
                </div>
                <div class="btn-group btn-group-justified">
                    <input type="button" onclick="document.location.href = '<?= base_url() ?>'" value="Voltar" />
                    <input type="submit" value="Cadastrar-se" />
                </div>
            </form>
        </div>
    </div>
</body>