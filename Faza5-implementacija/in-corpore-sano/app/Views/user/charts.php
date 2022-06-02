<!-- Mia Vucinic 0224/2019 -->
<?php
$uri = service('uri');
?>
<div id="content-charts">
    <div class="row">
        &nbsp;
    </div>
    <div class="row justify-content-center">

        <div class="col-1">
            <form action="/user/charts/water" method="post">
                <button type="submit" class="btn btn-primary btn-floating waterIcon">
                    <img src="/assets/images/challenge/glass.png" style="height:50px"><br>Water<br>consumed
                </button>
            </form>
        </div>

        <div class="col-1 offset-2">
            <form action="/user/charts/food" method="post">
                <button type="submit" class="btn btn-primary btn-floating foodIcon">
                    <img src="/assets/images/challenge/apple.png" style="height:50px"><br>Calories<br>consumed
                </button>
            </form>
        </div>

        <div class="col-1 offset-2">
            <form action="/user/charts/training" method="post">
                <button type="submit" class="btn btn-primary btn-floating trainingIcon">
                    <img src="/assets/images/challenge/runner.png" style="height:50px"><br>Calories<br>burned
                </button>
            </form>
        </div>
    </div>

    <div>
        <br>
    </div>
    <div>
        <br>
    </div>
    <div>
        <canvas id="myChart0" class="chart"></canvas>
    </div>
    <div>
        <br>
    </div>
    <div>
        <canvas id="myChart1" class="chart"></canvas>
    </div>
    <div>
        <br>
    </div>
    <div>
        <canvas id="myChart2" class="chart"></canvas>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function () {

        let colorArray = {};
        colorArray["water"] = "#adcce9";
        colorArray["food"] = "#d3e58a";
        colorArray["training"] = "#f1b5b8";

        let type = "<?php echo $uri->getSegment(3) ?>";

        let chart_data_week = JSON.parse('<?php echo $chart_week_data ?>');
        let chart_data_month = JSON.parse('<?php echo $chart_month_data ?>');
        let chart_data_year = JSON.parse('<?php echo $chart_year_data ?>');

        data_week = {
            labels: chart_data_week.label,
            datasets: [{
                label: type === "water" ? "ml" : "kcal",
                backgroundColor: colorArray[type],
                borderColor: colorArray[type],
                data: chart_data_week.data, // INSERT DATA
            }]
        };

        config_week = {
            type: 'bar',
            data: data_week,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        ticks: {
                            // beginAtZero: true
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Current week data'
                    }
                }
            }
        }

        data_month = {
            labels: chart_data_month.label,
            datasets: [{
                label: type === "water" ? "ml" : "kcal",
                backgroundColor: colorArray[type],
                borderColor: colorArray[type],
                data: chart_data_month.data, // INSERT DATA
            }]
        };

        config_month = {
            type: 'bar',
            data: data_month,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        ticks: {
                            // beginAtZero: true
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Current month data'
                    }
                }
            }
        }

        data_year = {
            labels: chart_data_year.label,
            datasets: [{
                label: type === "water" ? "ml" : "kcal",
                backgroundColor: colorArray[type],
                borderColor: colorArray[type],
                data: chart_data_year.data, // INSERT DATA
            }]
        };

        config_year = {
            type: 'bar',
            data: data_year,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        ticks: {
                            //beginAtZero: true
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Current year data'
                    }
                }
            }
        }

        let myChart0 = new Chart(
            document.getElementById('myChart0'),
            config_week
        );

        let myChart1 = new Chart(
            document.getElementById('myChart1'),
            config_month
        );

        let myChart2 = new Chart(
            document.getElementById('myChart2'),
            config_year
        );

    });

</script>
