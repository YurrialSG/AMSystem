<style>
    #icon{
        width: 80px;
        height: 70px;
    }

    .navbar {
        background-color: white;
        border: none;
    }

    #menuPesquisar{
        font-family: 'Open Sans Condensed', arial, sans;
        padding: 5px;
        width: 60%;
        background: #FFFFFF;
        margin: 10px 10px 10px 10px;
        /*box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);*/
        /*-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);*/
        /*-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);*/
    }

    #menuPesquisar input[type="text"],
    #menuPesquisar input[type="date"],
    #menuPesquisar input[type="datetime"],
    #menuPesquisar input[type="email"],
    #menuPesquisar input[type="number"],
    #menuPesquisar input[type="search"],
    #menuPesquisar input[type="time"],
    #menuPesquisar input[type="url"],
    #menuPesquisar input[type="password"],
    #menuPesquisar textarea,
    #menuPesquisar select 
    {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        display: block;
        width: 50%;
        padding: 7px;
        border: none;
        border-bottom: 1px solid #ddd;
        background: transparent;
        margin-bottom: 10px;
        font: 16px Arial, Helvetica, sans-serif;
        height: 45px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    #menuPesquisar input[type=text]:focus {
        width: 100%;
    }

    #menuPesquisar input[type="button"], 
    #menuPesquisar input[type="submit"]{
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
        width: 100%;
        margin: 10px 0px 0px 0px;
        text-decoration: none;
        text-transform: uppercase;
    }
    #menuPesquisar input[type="button"]:hover, 
    #menuPesquisar input[type="submit"]:hover {
        background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
        background-color:#34CACA;
    }
</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <img src="<?= base_url('icon/iconAccessMoto.png') ?>" id="icon">
        </ul>
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url('usuarios') ?>" style="font-family: fantasy;">Access Motos</a>
        </div>

        <div class="nav navbar-nav" id="menuPesquisar">
            <form method="post" action="<?= base_url('produtos/pesquisarIndex') ?>">
                <div class="col-sm-8">
                    <input type="text" name="pesquisado" placeholder="Item a ser pesquisado..." required/>
                </div>
                <div class="col-sm-4">
                    <input type="submit" value="Pesquisar" />
                </div>
            </form>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <?php if ($this->session->logado) { ?>
                <li><a type="button" class="btn"><span class="glyphicon glyphicon-user"></span> <?= $this->session->nome ?></a></li>
                <li><a href="<?= base_url('usuarios/sair') ?>"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
            <?php } else { ?>
                <li><a href="<?= base_url('usuarios/login') ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a type="button" class="btn" id="cadastrar-se" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Cadastrar-se</a></li>
                <?php } ?>   
        </ul>

    </div>
</nav>


