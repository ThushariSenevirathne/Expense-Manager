<!DOCTYPE html>

<?php
require 'Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new Classes\DbConnector();
$con = $dbcon->getConnection();

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

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <style>
            /* Hide scrollbar for Chrome, Safari and Opera */
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
                    </style>

        <!--add external files-->
        <link rel="Stylesheet" href="css/navbar.css">
        <script src="navbar.js"></script>

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet"/>

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>

    </head>
    <body>
        <section style="background-color: #eee;" >

            <div class="container py-5">

                <!--nav bar-->
                <br>
                <div class="row">
                    <div class="col">
                        <nav class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li>Home</li>
                                <li>&nbsp;&nbsp; > &nbsp;&nbsp;</li>
                                <li class="active">Our Team</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <!--propic and name-->
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body text-center"><h4>Manager</h4></div>
                        </div>
                    </div>            
                </div>
                <div class="row">
                    <?php
                    $query = "SELECT * FROM employee WHERE Type = 'Manager'";
                    $pstmt = $con->prepare($query);
                    $pstmt->execute();
                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $valueEmp) {
                        $id = $valueEmp->EmpID;
                        $fname = $valueEmp->FullName;
                        $email = $valueEmp->email;
                        ?>


                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card mb-4">
                                <div class="card-body text-center"><img src="Images/propic.JPG" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"><?php echo $fname ?></h5>
                                    <p class="text-muted mb-1"><?php echo $email ?></p><br>
                                    <div class="d-flex justify-content-center mb-2">
                                        <form action="Profile.php?id=<?php echo $id ?>" method="POST">
                                            <input type="submit" value="Profile" class="btn btn-primary"/></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row">
                    <!--propic and name-->
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body text-center"><h4>Finance Team</h4></div>
                        </div>
                    </div>            
                </div>

                <div class="row">
                    <?php
                    $query = "SELECT * FROM employee WHERE Type = 'Finance Team Member'";
                    $pstmt = $con->prepare($query);
                    $pstmt->execute();
                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $valueEmp) {
                        $id = $valueEmp->EmpID;
                        $fname = $valueEmp->FullName;
                        $email = $valueEmp->email;
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6"><div class="card mb-4">
                                <div class="card-body text-center"><img src="Images/propic.JPG" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"><?php echo $fname ?></h5>
                                    <p class="text-muted mb-1"><?php echo $email ?></p><br>
                                    <div class="d-flex justify-content-center mb-2">
                                        <form action="Profile.php?id=<?php echo $id ?>" method="POST">
                                            <input type="submit" value="Profile" class="btn btn-primary"/></form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

                <div class="row">
                    <!--propic and name-->
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body text-center"><h4>Employee</h4></div>
                        </div>
                    </div>            
                </div>

                <div class="row">
                    <?php
                    $query = "SELECT * FROM employee WHERE Type = 'Employee'";
                    $pstmt = $con->prepare($query);
                    $pstmt->execute();
                    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

                    foreach ($rs as $valueEmp) {
                        $id = $valueEmp->EmpID;
                        $fname = $valueEmp->FullName;
                        $email = $valueEmp->email;
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6"><div class="card mb-4">
                                <div class="card-body text-center"><img src="Images/propic.JPG" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"><?php echo $fname ?></h5>
                                    <p class="text-muted mb-1"><?php echo $email ?></p><br>
                                    <div class="d-flex justify-content-center mb-2">
                                        <form action="Profile.php?id=<?php echo $id ?>" method="POST">
                                            <input type="submit" value="Profile" class="btn btn-primary"/></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </section>
    </body>
</html>
