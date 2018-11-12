<style>
    .disabilitar {
        pointer-events: none;
        cursor: default;
        background-color: #ddd;
    }

    #icon {
        padding: 8px;
        margin-left: 20px;
        margin-right: 35px;
        width: 80%;
        height: 50px;
    }

    .navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; transition: transform 0.3s; }

    .btn.btn-circle { border-radius: 50px; }
    .btn.btn-outline { background-color: transparent; }

    #navBar {
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
    }

    .navbar-light .navbar-nav > li > a:hover {
        background-color: transparent;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
        color: black;
    }

    .navbar-light .navbar-nav > li > a:focus {
        background-color: transparent;
        color: black;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navBar">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <a href="<?= base_url('usuarios') ?>">
                <img src="<?= base_url('assets/img/AMSystem.png') ?>"  id="icon">
            </a> 
        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('relatorios/produtos') ?>">Funcionários</a></li>
                    <li><a href="<?= base_url('relatorios/usuarios') ?>">Acidentes</a></li>
                    <li><a href="<?= base_url('relatorios/vendas') ?>" class="disabilitar">Vendas</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gráficos <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('produtos/grafico') ?>">Funcionários</a></li>
                    <li><a href="<?= base_url('usuarios/grafico') ?>">Acidentes</a></li>
                    <li><a href="<?= base_url('vendas/grafico') ?>" class="disabilitar">Setores</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= base_url('usuarios/dados') ?>"><span class="glyphicon glyphicon-user"></span> <?= $this->session->nome ?></a></li>
            <li><a class="btn btn-default btn-outline btn-circle collapsed" href="<?= base_url('usuarios/sair') ?>"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
        </ul>
    </div>
</nav>
