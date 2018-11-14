<style>
    p {
        font-size: 16px;
        line-height: 1.4em;
    }

    .icon-primary {
        color: #7A9E9F;
    }

    .icon-info {
        color: #68B3C8;
    }

    .icon-success {
        color: #7AC29A;
    }

    .icon-warning {
        color: #F3BB45;
    }

    .icon-danger {
        color: #EB5E28;
    }

    .main-panel {
        position: relative;
        z-index: 2;
        width: 100%;
        -webkit-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -moz-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -o-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        -ms-transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
        transition: all 0.33s cubic-bezier(0.685, 0.0473, 0.346, 1);
    }

    .main-panel > .content {
        padding: 30px 15px;
        min-height: calc(100vh - 123px);
    }

    .main-panel .navbar {
        margin-bottom: 0;
    }

    .card {
        border-radius: 6px;
        box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
        background-color: #FFFFFF;
        color: #252422;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .card .image {
        width: 100%;
        overflow: hidden;
        height: 260px;
        border-radius: 6px 6px 0 0;
        position: relative;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .card .image img {
        width: 100%;
    }

    .card .content {
        padding: 15px 15px 10px 15px;
    }

    .card .header {
        padding: 20px 20px 0;
    }

    .card .description {
        font-size: 16px;
        color: #66615b;
    }

    .card h6 {
        font-size: 12px;
        margin: 0;
    }

    .card .category,
    .card label {
        font-size: 14px;
        font-weight: 400;
        color: #9A9A9A;
        margin-bottom: 0px;
    }

    .card .category i,
    .card label i {
        font-size: 16px;
    }

    .card label {
        font-size: 15px;
        margin-bottom: 5px;
    }

    .card .title {
        margin: 0;
        color: #252422;
        font-weight: 300;
    }

    .card .avatar {
        width: 50px;
        height: 50px;
        overflow: hidden;
        border-radius: 50%;
        margin-right: 5px;
    }

    .card .alert.alert-with-icon {
        padding-left: 65px;
    }

    .card .icon-big {
        font-size: 3em;
        min-height: 64px;
    }

    .card .numbers {
        font-size: 2em;
        text-align: right;
    }

    .card .numbers p {
        margin: 0;
    }
</style>

<body style="background-color: white;">
    <div class="col-sm-10" style="margin-left: 200px; margin-top: -20px;">
        <div class="wrapper">
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="icon-big icon-warning text-center">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <div class="numbers">
                                                    <p>Funcionários</p>
                                                    <?php foreach ($totalFuncionario as $totalQuantidade) { ?>
                                                        <?= $totalQuantidade->total ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="icon-big icon-success text-center">
                                                    <i class="glyphicon glyphicon-comment"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <div class="numbers">
                                                    <p>Mensagens</p>
                                                    <?php foreach ($totalMensagem as $totalQuantidade) { ?>
                                                        <?= $totalQuantidade->total ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="icon-big icon-danger text-center">
                                                    <i class="glyphicon glyphicon-alert"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <div class="numbers">
                                                    <p>Acidentes</p>
                                                    <?php foreach ($totalAcidente as $totalQuantidade) { ?>
                                                        <?= $totalQuantidade->total ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="icon-big icon-info text-center">
                                                    <i class="glyphicon glyphicon-cog"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <div class="numbers">
                                                    <p>Empresas</p>
                                                    <?php foreach ($totalEmpresa as $totalQuantidade) { ?>
                                                        <?= $totalQuantidade->total ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div id="grafico_Aci01" style="width: 550px; height: 400px;"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div id="grafico_Aci02" style="width: 550px; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-7 col-sm-7">
                                <div class="card">
                                    <div id="grafico_Func01" style="width: 100%; height: 350px;"></div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-5">
                                <div class="card">
                                    <div id="grafico_Func01" style="width: 100%; height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>

