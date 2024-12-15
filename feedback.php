<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require_once 'Classes/Feedbackctrl.php';
$currentDate = date("Y-m-d ");

$uname = $_SESSION["Username"];
$EmpID = $_SESSION["u_id"];
$Type = $_SESSION["type"];

if ($uname == NULL) {
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FeedBack</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <link src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" ></script>
        <script src="https://kit.fontawesome.com/3c5ab4b467.js" crossorigin="anonymous"></script>
        <script src="index.js"></script>
        <script src="../assets/js/color-modes.js"></script>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <link src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

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
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="container text-center mt-5">         
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#AddFeed" style="width:80%; height: 50px;"><div class="row"><i class="fa-thin fa-plus fa-lg" style="color: #3aa0df;">  Add FeedBack</i></div></button>
                    </div>
                </div> 
            </div> 

            <!-- Modal for Add feedback -->

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate >
                <div class="modal fade" id="AddFeed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
                        <div class="modal-content w-150">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add FeedBack</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="was-validated">
                                    <div class="row">
                                        <div class="mb-3">
                                            <div class="card">
                                                <span class="input-group-text" id="basic-addon3">User Name</span>
                                                <div class="col-sm-8">
                                                    <input type="text" name="UserName"  class="form-control" placeholder="<?php echo $name ?>" id="basic-url" aria-describedby="basic-addon3 basic-addon4" disabled="">
                                                </div>
                                            </div>
                                            <div class="card">
                                                <span class="input-group-text" id="basic-addon3">FeedBack</span>
                                                <input type="text" name="FEED" placeholder="Type your feedback" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                                            </div>
                                            <h6>Date: <?php echo $currentDate ?></h6>
                                        </div>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                <button   name="add" class="btn btn-primary" type="submit">Add</button>

                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <?php
            echo $FeedErr;
            echo $Feed;
            ?>
                                
            <!-- Feedback Cards Section -->
            <?php while ($lise != NULL){?>
            <div class="alert alert-info m-4" role="alert">
                <p class="fw-semibold"><?php echo $lise['name']; ?></p>
                <p class="fst-normal mx-3 my-2"><?php echo $lise['msg']; ?></p>
                <p class="fw-light text-muted mx-3"><?php echo $lise['date']; ?></p>
            </div>
            <?php } ?>
          

            
        </div>

        
    </body>
</html>