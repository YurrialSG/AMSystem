<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Setor');
        data.addColumn('number', 'Nº Acidentes');

<?php foreach ($acidentesSetor as $acidente) { ?>
            data.addRows([['<?= $acidente->nomeSetor ?>', <?= $acidente->num ?>]]);
<?php } ?>

        var options = {
            title: 'Nº de Acidentes por Setor',
            is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico_Aci01'));
        chart.draw(data, options);
    }
</script>
</head>