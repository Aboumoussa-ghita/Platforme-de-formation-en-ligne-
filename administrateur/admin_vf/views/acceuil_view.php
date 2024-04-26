<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- My CSS -->
<link rel="stylesheet" href="acceui_css.css">

<?php
$title="";
ob_start();
?>
<html>
<head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Utilisateur', 'Effectif'],
                ['Apprenti',<?php echo $nb_apprentis ?>],
                ['Formateur',<?php echo  $nb_formateurs ?>],
                ['Administrateur',1],

            ]);

            var options = {
                title: 'Visualisation de l\'effectif des utilisateurs par type' ,
                colors: ['#3C91E6', '#EAE132', '#00008B'],
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Formation', 'Nombre d\'utilisateurs'],
                <?php foreach ($formationsAvecNbApprentis as $formation): ?>
                ['<?php echo $formation['NOM_FOR']; ?>', <?php echo $formation['nbApprentis']; ?>],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'Nombre d\'apprentis par formation',
                legend: 'none',
                crosshair: { trigger: 'both', orientation: 'both' },
                colors: [ '#EAE132', '#00008B'],

                trendlines: {
                    0: {
                        type: 'polynomial',
                        degree: 3,
                        visibleInLegend: true,
                    }
                }
            };

            var chart = new google.visualization.ScatterChart(document.getElementById('polynomial2_div'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['mois', 'Nombre de formation'],
                <?php  foreach ($formationsParMois as $formation): ?>
                ['<?php echo $formation['mois']; ?>',<?php echo $formation['nombre_formations']; ?> ],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'Nombre de Formations Déposées par Mois',
                legend: 'none',
                colors: ['3C91E6'],
                crosshair: { trigger: 'both', orientation: 'both' },
                trendlines: {
                    0: {
                        type: 'line',
                        degree: 3,
                        visibleInLegend: true,
                    }
                },
                chartArea: {width: '80%', height: '70%'},
                hAxis: {
                    title: 'Mois',
                    titleTextStyle: {
                        bold: true
                    }
                },
                vAxis: {
                    title: 'Nombre de Formations',
                    titleTextStyle: {
                        bold: true
                    },
                    minValue: 0
                },
                bars: 'vertical'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('polynomial2_div2'));
            chart.draw(data, options);
        }
    </script>

</head>
<body>

<main style=" margin-top: -90px  ; padding: 2rem 1.5rem; min-height: calc(100vh); width: 102%">

    <br><br>
    <div class="cards" style="display: grid; grid-template-columns: repeat(4, 1fr); grid-gap: 2rem; margin-top: 0rem;">
        <div class="card-single" style="display: flex; background-color: #fff; justify-content: space-between; padding: 2rem; border-radius: 10px;box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%);">

            <svg style="color: EAE132 ; text-align: center;  " xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <div>
                <h2><?php echo $nb_apprentis ?></h2>
                <small style="color: #2d6987;">Apprentis</small>
            </div>
            <div>
                <span class="fa fa-shopping-cart" style="color: #f8e80c;"></span>
            </div>
        </div>

        <div class="card-single" style="display: flex; background-color: #fff; justify-content: space-between; padding: 2rem; border-radius: 10px;box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%);">

            <svg style="color: EAE132 ; text-align: center; " xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <div>
                <h2><?php echo $nb_formateurs ?></h2>
                <small style="color: #2d6987;">Formateurs</small>
            </div>
            <div>
                <span class="fa fa-shopping-cart" style="color: #f8e80c;"></span>
            </div>
        </div>


        <div class="card-single" style="display: flex; background-color: #fff; justify-content: space-between; padding: 2rem; border-radius: 10px;box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%);">

            <svg style="color: EAE132 ; text-align: center; " xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <div>
                <h2>1</h2>
                <small style="color: #2d6987;">Administrateurs</small>
            </div>
            <div>
                <span class="fa fa-shopping-cart" style="color: #f8e80c;"></span>
            </div>
        </div>

        <div class="card-single" style="display: flex ; background-color: #fff; justify-content: space-between; padding: 2rem; border-radius: 10px;box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%);">

            <svg style="color: EAE132 ; text-align: center; " xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
            <div>
                <h2><?php echo $nb_formations ?></h2>
                <small style="color: #2d6987;">Formations</small>
            </div>
            <div>
                <span class="fa fa-shopping-cart" style="color: #f8e80c; "></span>
            </div>
        </div>
    </div>
    <br>

    <div class="graph-container" style="display: flex;">
        <div id="piechart" class="card-single" style="background-color: #fff; justify-content: space-between; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); width: 506px; height: 300px; border: 10px; margin-right: 20px;"></div>

        <div id="polynomial2_div" class="card-single" style="background-color: #fff; justify-content: space-between; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); width: 506px; height: 300px; border: 10px; margin-left: 20px;"></div>
    </div>
    <div id="polynomial2_div2" class="card-single" style="background-color: #fff; justify-content: space-between; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); width: 1050px; height: 400px; border: 10px;margin-top: 2%; margin-right: 20px;"></div>


</main>
</body>
</html>



<?php $content=ob_get_clean();?>
<?php include_once 'views/layout.php';?>