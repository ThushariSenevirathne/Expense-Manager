<?php

namespace Classes;
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

use PDOException;
use PDO;

require 'Classes/DbConnector.php';

use Classes\DbConnector;

//create db conection
$db_obj = new DbConnector();
$con = $db_obj->getConnection();

$sql = "SELECT DISTINCT proposal.ProID,employee.Username, proposal.Date, proposal.Status FROM employee, proposal WHERE employee.EmpID = proposal.EmpID AND proposal.Status='pending' ";

$exicute = $con->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet"/>

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>

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
        <title>Proposals Features</title>
    </head>
    <body style="background-color: #eee;">
        <section style="background-color: #eee; padding-top: 20px;">    
            <div class="container py-5">

                <!--nav bar-->
                <br>
                <div class="row">
                    <div class="col-lg-1"></div>    
                    <div class="col-lg-10">
                        <nav class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li>Pending Proposals</li>

                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-1"></div>
                </div>


                <!--user Information-->
                <div class="row">



                    <div class="col-lg-1"></div>    
                    <div class="col-lg-10">

                        <!--main information-->
                        <div class="card mb-8">
                            <div class="card-body">
                                <?php while ($row = $exicute->fetch()){ ?>
                                <div class="row">

                                    <div class="col-sm-4"><p class="text-muted mb-0"><?php echo "Name : ".$row['Username'];?></p></div>
                                    <div class="col-sm-4"><p class="text-muted mb-0"><?php echo "Submit Date :".$row['Date'] ?></p></div>
                                    <div class="col-sm-2"><p class="text-muted mb-0"><?php echo "Status :".$row['Status'] ?></p></div>
                                    <div class="col-sm-2"><p class="text-muted mb-0"></p><a href="proposal.php?w_id=<?php echo $row['ProID']?>" class="btn btn-primary mb-2">Review</a></div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>    



                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
