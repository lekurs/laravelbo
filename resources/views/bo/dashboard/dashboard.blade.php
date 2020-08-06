@extends('admin-layout')

@section('title', 'Dashboard')

@section('body')
    <div class="mout-bo-section-container">
        <div class="mout-admin-dashboard-container">
        <div class="row">
            <div class="col-md-12 col-xl-2">
                <div class="mout-admin-dashboard-information-container">
                    <div class="mout-admin-dashboard-information-header-content">
                        <i class="far fa-eye fa-3x"></i>
                    </div>
                    <div class="mout-admin-dashboard-information-content">
                        <p>nb visiteurs</p>
                        <p>1200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-2">
                <div class="mout-admin-dashboard-information-container">
                    <div class="mout-admin-dashboard-information-header-content">
                        <i class="far fa-eye fa-3x"></i>
                    </div>
                    <div class="mout-admin-dashboard-information-content">
                        <p>Clients</p>
                        <p>1200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-2">
                <div class="mout-admin-dashboard-information-container">
                    <div class="mout-admin-dashboard-information-header-content">
                        <i class="far fa-eye fa-3x"></i>
                    </div>
                    <div class="mout-admin-dashboard-information-content">
                        <p>nb visiteurs</p>
                        <p>1200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-2">
                <div class="mout-admin-dashboard-information-container">
                    <div class="mout-admin-dashboard-information-header-content">
                        <i class="far fa-eye fa-3x"></i>
                    </div>
                    <div class="mout-admin-dashboard-information-content">
                        <p>nb visiteurs</p>
                        <p>1200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="mout-admin-dashboard-information-container">
                    <div class="mout-admin-dashboard-information-header-content">
                        <i class="far fa-eye fa-3x"></i>
                    </div>
                    <div class="mout-admin-dashboard-information-content">
                        <p>nb visiteurs</p>
                        <p>1200</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="mout-bo-section-container">
        <div class="mout-admin-dashboard-charts-container">
            <div id="chart_div"></div>
            <div id="chart_estimation_invoice"></div>
            <div id="curve_chart"></div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            // Create the data table.
            var data = google.visualization.arrayToDataTable(
                [
                    ['Client', 'Devis'],
                    <?php
                    foreach ($clientTab as $key => $tab) {
                        echo "['" . addslashes($key) . "'," .$tab .  "]" . ",";
                    }
                    ?>
                ]
            );

            // Set chart options
            var options = {'title':'CA devis validé par client',
                'width':900,
                'height':500};

            // Instantiate and draw our chart, passing in some options.
            // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Devis', 'Factures'],
                ['Devis' , {{$totalEstimations}}],
                ['Factures', {{$totalInvoices}}],
            ]);

            var options = {
                title: 'Nombre de devis / factures en cours',
                pieHole: 0.4,
                width: 900,
                height: 500,
                colors: ["#03DBC2", "#7A63F9"],
                legend: { position: 'bottom', alignment: 'start' },
                pieSliceText: 'label',
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_estimation_invoice'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = $.ajax({
                url: "/api/charts-ca",
                dataType: "json",
                async: false
            }).responseJSON;

            const chartData = google.visualization.arrayToDataTable(jsonData);

            var options = {
                title: 'Chiffre d\'affaire MOUT',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(chartData, options);
            }
    </script>
@endsection
