<style>
    .disabilitar {
        pointer-events: none;
        cursor: default;
        background-color: #ddd;
    }

    #icon{
        padding: 1px;
        width: 60px;
        height: 50px;
    }

    .navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; transition: transform 0.3s; }

    .btn.btn-circle { border-radius: 50px; }
    .btn.btn-outline { background-color: transparent; }

    #icon{
        padding: 1px;
        margin-left: 10px;
        margin-right: 10px;
        width: 80%;
        height: 50px;
    }
</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <a href="<?= base_url('usuarios') ?>">
                <img src="<?= base_url('assets/img/AMSystem.png') ?>"  id="icon">
            </a>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?= $this->session->nome ?></a></li>
            <li><a class="btn btn-default btn-outline btn-circle collapsed" href="<?= base_url('usuarios/sair') ?>"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
        </ul>
    </div>
</nav>
