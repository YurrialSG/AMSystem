<style>
    .disabilitar {
        pointer-events: none;
        cursor: default;
        background-color: #ddd;
    }

    #icon{
        width: 80px;
        height: 70px;
    }
</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <img src="<?= base_url('icon/iconAccessMoto.png')?>" id="icon">
        </ul>
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url('usuarios') ?>" style="font-family: fantasy;">Access Motos</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('relatorios/produtos') ?>">Produtos</a></li>
                    <li><a href="<?= base_url('relatorios/usuarios') ?>">Usuários</a></li>
                    <li><a href="<?= base_url('relatorios/vendas') ?>" class="disabilitar">Vendas</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gráficos <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('produtos/grafico') ?>">Produtos</a></li>
                    <li><a href="<?= base_url('usuarios/grafico') ?>">Usuários</a></li>
                    <li><a href="<?= base_url('vendas/grafico') ?>" class="disabilitar">Vendas</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= $this->session->nome ?></a></li>
            <li><a href="<?= base_url('usuarios/sair') ?>"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
        </ul>
    </div>
</nav>
