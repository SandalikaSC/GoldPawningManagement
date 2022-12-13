<?php
$username = "root";
$password = "";
$database = "charts";  //data base name eka

try {
    $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
    //set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
        .chartBox {
            width: 400px;
            margin: 20px auto;

        }

        @media screen and (max-width:460px) {
            .chartBox {
                width: 350px;
            }
        }

        @media screen and (max-width:415px) {
            .chartBox {
                width: 300px;
            }
        }

        @media screen and (max-width:415px) {
            .chartBox {
                width: 200px;
            }
        }


        
    </style>
</head>

<body>

    <?php
    //attempt select query execution
    try {
        $sql = "select * from charts.chart_1";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            $amount = array();
            $label = array();
            while ($row = $result->fetch()) {  //until the data of the table is over, while loop will be executed.
                $amount[] = $row["amount"];
                $label[] = $row["label"];
            }
            unset($result);
        } else {
            echo "No records matching your query were found. ";
        }
    } catch (PDOException $e) {
        die("ERROR: Could not be able to execute $sql. " . $e->getMessage());
    }

    //close connection
    unset($pdo);
    ?>

    <!-- meka natuwa chart eka pennanne na -->
    <div class="chartBox">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //setup block
        const amount = <?php echo json_encode($amount); ?>; //converted to JSON format
        const label = <?php echo json_encode($label); ?>;


        const data = {
            labels: label,
            // labels: ['A', 'BLue', 'C', 'D', 'E', 'F'],
            datasets: [{
                label: '2020 I N C O M E',
                //data: [12, 19, 3, 5, 2, 3],
                data: amount, //after converted to json format, set it on the graph
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]

        };


        //config block
        const config = {
            type: 'bar', //bar or pie 
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        };

        //Reder block
        const myChart = new Chart(
            document.getElementById('myChart'), config
        );
    </script>
</body>

</html>