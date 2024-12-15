<!DOCTYPE html>
<?php
// Declare Variables
$server = "localhost";
$userName = "root";
$password = "";
$dbName = "expensemanager";

// starting Connection with Database

$con = mysqli_connect($server, $userName, $password, $dbName);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <link src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" ></script>
        <script src="https://kit.fontawesome.com/3c5ab4b467.js" crossorigin="anonymous"></script>
        <script src="index.js"></script>
        <script src="../assets/js/color-modes.js"></script>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/" />
        <style>
            body::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            body {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }
            body{
                overflow-y: visible;
                overflow-x: hidden;
            }
            .aprovedHedding {
                color: #141817;
            }
            .pendingHedding {
                color: black;
            }
            .ProposalCard:hover {
                transform: scale(1.05);
            }
            .tableBody {
                background-color: rgb(207, 199, 199);
            }
            .hedderBody {
                background-image: url(https://i0.wp.com/juntrax.com/blog/wp-content/uploads/2021/07/What-is-Expense-Management.jpg);
            }
            .greet {
                color: white;
            }

        </style>
    </head>
    <body>
        <!--Expense Chartt start-->
        <div>
            <div class="container text-center">
                <div class="row">
                    <div class="col chart1 text-center">
                        <h1 class="text">Pending Proposals Cost</h1>
                        <canvas id="myChart" class="mt-4" style="height: 300px;"></canvas>
                    </div>
                    <div class="col chart2 text-center">
                        <h1 class="text">Recent Expenses</h1>
                        <canvas id="myChart2" class="mt-4"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx2 = document.getElementById('myChart2');
            new Chart(ctx2, {
            type: 'doughnut',
                    data: {
                    labels: [
<?php
$queryExpenses = "SELECT * from proposal WHERE Status =" . "'Approved';";
$resultchart2 = mysqli_query($con, $queryExpenses);
while ($row = mysqli_fetch_assoc($resultchart2)) {
    ?>
    <?php
    $subject = $row['Subject'];
    echo "'" . "$subject" . "'" . ",";
    ?>
    <?php
}
?>
                    ],
                            datasets: [{
                            label: 'In Rupees',
                                    data: [
<?php
$queryExpenses = "SELECT * from proposal WHERE Status =" . "'Approved';";
$resultchart2 = mysqli_query($con, $queryExpenses);
while ($row = mysqli_fetch_assoc($resultchart2)) {
    ?>
    <?php
    $amount = $row['Amount'];
    echo "'" . "$amount" . "'" . ",";
    ?>
    <?php
}
?>
                                    ],
                                    borderWidth: 1
                            }]
                    },
                    options: {
                    scales: {
                    y: {
                    beginAtZero: true
                    }
                    }
                    }
            });
        </script>
        <script>
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
            type: 'bar',
                    data: {
                    labels: [
<?php
$queryExpenses = "SELECT * from proposal WHERE Status =" . "'Pending';";
$resultchart2 = mysqli_query($con, $queryExpenses);
while ($row = mysqli_fetch_assoc($resultchart2)) {
    ?>
    <?php
    $ProID = $row['ProID'];
    echo "'" . "$ProID" . "'" . ",";
    ?>
    <?php
}
?>
                    ],
                            datasets: [{
                            label: 'In Rupees',
                                    data: [
<?php
$queryExpenses = "SELECT * from proposal WHERE Status =" . "'Pending';";
$resultchart2 = mysqli_query($con, $queryExpenses);
while ($row = mysqli_fetch_assoc($resultchart2)) {
    ?>
    <?php
    $expense = $row['Amount'];
    echo "$expense" . ",";
    ?>
    <?php
}
?>
                                    ],
                                    borderWidth: 1
                            }]
                    },
                    options: {
                    scales: {
                    y: {
                    beginAtZero: true
                    }
                    }
                    }
            });
        </script>
        <!--Expense Chart end-->

    </body>
</html>


