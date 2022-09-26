<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>

    <script>

    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['City', '2010 Population',],

            <?php
            
            include '../connect.php';
            $sql = " SELECT * FROM city";
            $consulta = mysqli_query($con, $sql);

            while ($dados = mysqli_fetch_array($consulta)){

                $idCity = $dados['idCity'];
                $nameCity = $dados['nameCity'];?>    

            ['<?php echo $nameCity ?>', <?php echo $idCity ?>],
            
    <?php } ?>
            
        ]);

        var options = {
            title: 'Population of Largest U.S. Cities',
            chartArea: {width: '50%'},
            hAxis: {
            title: 'Total Population',
            minValue: 0
            },
            vAxis: {
            title: 'City'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
        }
    </script>
</body>
</html>