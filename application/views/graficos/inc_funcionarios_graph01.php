<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Empresa');
        data.addColumn('number', 'Nº Funcionarios');

<?php foreach ($funcionariosEmpresa as $funcionariosEmp) { ?>
            data.addRows([['<?= $funcionariosEmp->nomeEmpresa ?>', <?= $funcionariosEmp->num ?>]]);
<?php } ?>

        var options = {
            title: 'Nº de Funcionários por Empresas',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico_Func01'));
        chart.draw(data, options);
    }
</script>
</head>