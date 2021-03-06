<style>
    .col-sm-2 {
        padding: 0;
        margin: 0;
        margin-top: -20px;
    }

    .menu {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: transparent;
        height: 100%;
        overflow: auto;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
        position: fixed;
    }

    .disabilitar {
        pointer-events: none;
        cursor: default;
        background-color: white;
    }

    li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    /* Change the link color on hover */
    li a:hover {
        background-color: #555;
        color: white;
        text-decoration: none;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
    }

    li a.active {
        background-color: teal;
        color: white;
    }

    li a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

</style>

<div class="col-sm-2">
    <ul class="menu">
        <li><a class="active" href="<?= base_url('admin/pagina') ?>">Home</a></li>
        <li><a href="<?= base_url('empresa') ?>">Empresa</a></li>
        <li><a href="<?= base_url('funcionario') ?>">Funcionários</a></li>
        <li><a href="<?= base_url('setor') ?>">Setores</a></li>
        <li><a href="<?= base_url('acidente') ?>">Acidentes</a></li>
        <li><a href="<?= base_url('mensagem') ?>">Mensagens</a></li>
        <li><a href="<?= base_url('nrs') ?>">NR's</a></li>
        <!--<li class="disabilitar"><a href="<? base_url('itensVenda') ?>">NR's</a></li>-->
        <!--<li><a href="<? base_url('anexos') ?>">Anexos</a></li>-->
        <li><a href="<?= base_url('usuarios/usuariosAdmin') ?>">Usuários</a></li>
    </ul>
</div>