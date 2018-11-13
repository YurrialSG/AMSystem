<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Empresa');
        data.addColumn('number', 'Nº Acidentes');

<?php foreach ($acidentesEmpresa as $acidente) { ?>
            data.addRows([['<?= $acidente->nomeEmpresa ?>', <?= $acidente->num ?>]]);
<?php } ?>

        var options = {
            title: 'Nº de Acidentes por Empresa',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico_Aci02'));
        chart.draw(data, options);
    }
</script>
</head>