<!DOCTYPE html>
<?php

require_once 'Classes/DbConnector.php';
$dbcon = new Classes\DbConnector();

session_start();
$uname = $_SESSION["Username"];
$EmpID = $_SESSION["u_id"];
$Type = $_SESSION["type"];

if ($uname == NULL) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit();
}
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

        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary hedderBody" style="height: 400px;">
            <div class="container text-center mt-1">
                <h1 class="display-4 fw-normal greet">Welcome Manager</h1>
                <p class="lead fw-normal greet">
                    Thank you for using our Expense Management System. As a manager, you
                    have access to various features and tools to effectively manage the
                    company's expenses. With our user-friendly interface, you can review
                    and process pending proposals, monitor spending trends, set budgets,
                    generate reports, and manage user permissions. Feel free to explore
                    the dashboard and utilize the available functionalities to streamline
                    the expense management process. If you have any questions or need
                    assistance, please don't hesitate to reach out to our support team. We
                    wish you a productive and successful experience with our system. Allso
                    we are providing you a perfect doc for the system it will help you.
                </p>
                <a class="btn btn-success" href="#">Docs</a>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div
                class="product-device product-device-2 shadow-sm d-none d-md-block"
                ></div>
        </div>

        <!--Add New Member, Give Promotion, Remove Member, Pending proposals Start-->
        <div class="container text-center mt-5">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg ProposalCard" style=" background-image: url('https://www.solidbackgrounds.com/images/1920x1080/1920x1080-light-green-solid-color-background.jpg'); background-position: center; object-fit: fill; "  >
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-6 mt-2 mb-6 display-8 lh-1 fw-bold aprovedHedding">Add New Member</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center mt-3">
                                    <button class="btn btn-success align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#Add">Add Member</button>                
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>  

                <!-- Modal for New Member -->
                <div class="modal fade" id="Add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <form class="was-validated" action="Classes/ControlMng.php" method="post">
                                <input type="hidden" name="Add_member" value="1">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Member</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Create UserName</label>
                                            <div class="input-group">
                                                <span class="input-group-text">UserName</span>
                                                <input type="text" class="form-control" required name="uname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Create Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Password</span>
                                                <input type="text" class="form-control" required name="pword">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="form-label">Select Role</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Role</span>
                                            <select class="form-select" required name="Role">            
                                                <option value="Employee">Employee</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Finance Team Member">Finance Team Member</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                    <button type="sumbit" class="btn btn-primary">Add User</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!--model end-->

                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg ProposalCard" style=" background-image: url('https://www.solidbackgrounds.com/images/1920x1080/1920x1080-baby-blue-eyes-solid-color-background.jpg');" >
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1" >
                            <h3 class="pt-6 mt-2 mb-6 display-8 lh-1 fw-bold aprovedHedding">Give Promotion To Employer</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Promotion">Give Promotion</button>                
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Modal for Give Promotion To Employer -->
                <div class="modal fade" id="Promotion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <form class="was-validated" action="Classes/ControlMng.php" method="post">
                                <input type="hidden" name="promote_member" value="1">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Give Promotion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <label class="form-label">Select Employer Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Username</span>
                                            <select class="form-select" required name="uname">
                                                <?php
                                                $con = $dbcon->getConnection();
                                                $query = "SELECT Username FROM employee";
                                                $pstmt = $con->prepare($query);
                                                $pstmt->execute();
                                                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
                                                foreach ($rs as $valueEmp) {
                                                    ?>
                                                    <option value="<?php echo $valueEmp->Username ?>"><?php echo $valueEmp->Username ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="form-label">Select Role</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Role</span>
                                            <select class="form-select" required name="role">            
                                                <option value="Employee">Employee</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Finance Team Member">Finance Team Member</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                    <button type="sumbit" class="btn btn-primary">Promote</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!--model end-->

                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg ProposalCard" style=" background-image: url('https://cdn.wallpapersafari.com/43/47/4KupwZ.jpg'); background-position: center; object-fit: fill; "  >
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-6 mt-2 mb-6 display-8 lh-1 fw-bold aprovedHedding">Remove Member</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center mt-3">
                                    <button class="btn btn-danger align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#Remove">Remove</button>                
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>  

                <!-- Modal for Remove Member -->
                <div class="modal fade" id="Remove" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <form class="was-validated" action="Classes/ControlMng.php" method="post">
                                <input type="hidden" name="remove_member" value="1">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Remove Member</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Select UserName</label>
                                            <span class="input-group-text">Username
                                                <select class="form-select" required name="uname">
                                                    <?php
                                                    $con = $dbcon->getConnection();
                                                    $query = "SELECT Username FROM employee WHERE Type!='NotFound'";
                                                    $pstmt = $con->prepare($query);
                                                    $pstmt->execute();
                                                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
                                                    foreach ($rs as $valueEmp) {
                                                        ?>
                                                        <option value="<?php echo $valueEmp->Username ?>"><?php echo $valueEmp->Username ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select></span>

                                            <div class="input-group">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                    <button type="sumbit" class="btn btn-primary">Remove User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--model end-->

                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg ProposalCard" style=" background-image: url('https://plainbackground.com/plain1024/fef65b.png'); ">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1" >
                            <h3 class="pt-6 mt-2 mb-6 display-8 lh-1 fw-bold pendingHedding">Review Proposals</h3>
                            <ul class="d-flex list-unstyled mt-auto">
                                <a href="proposals.php">
                                    <li class="d-flex align-items-center">
                                        <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdropPP" aria-controls="staticBackdropPP">Review</button>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div><br>

            </div>
        </div>
        <!--Add New Member, Give Promotion, Remove Member, Pending proposals End-->

        <br><Br><Br>







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


