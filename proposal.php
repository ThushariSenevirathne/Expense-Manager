<?php
//session_start();
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
require 'Classes/EditPro.php';

$pro_obj = new Classes\EditPro();

//get position type using login session 
//$position_type = $_SESSION['ptype'];
$position_type = "manager";
$status = $pro_obj->is_rejected();

$is_cmmt = FALSE;

if (isset($_GET)) {
    $pro_obj->set_id($_GET['w_id']);
}

$ap = $re = FALSE;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['aprv'])) {
        $ap = $pro_obj->approve();
    }

    if (isset($_POST['rjct'])) {
        $re = $pro_obj->approve();
        //$re = TRUE;
    }

    if (isset($_POST['add_comment'])) {
        $comment = $_POST['comment'];
        $pro_obj->addComment($comment);
    }
    if (isset($_POST['save_cmmt'])) {
        $message = $_POST['cmmt'];
        $cmmt = filter_var($message, FILTER_SANITIZE_STRING);
        //echo $cmmt;
        $is_cmmt = $pro_obj->Addcomment($cmmt, $position_type);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <link src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" ></script>
        <script src="https://kit.fontawesome.com/3c5ab4b467.js" crossorigin="anonymous"></script>
        <script src="index.js"></script>
        <script src="../assets/js/color-modes.js"></script>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <link src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
                <!-- Nav bar -->
                <br>
                <div class="row">
                    <div class="col-lg-1"></div>    
                    <div class="col-lg-10">
                        <nav class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li>Home</li>
                                <li>&nbsp;&nbsp; > &nbsp;&nbsp;</li>                            
                                <li>Proposals</li>
                                <li>&nbsp;&nbsp; > &nbsp;&nbsp;</li>
                                <li>Review</li>

                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>    
                    <div class="col-lg-6">
                        <!-- Proposal Summary -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="mb-3">Proposal Summary</h4>
                                        <p><strong>Author:</strong> </p>
                                        <p>-<?php echo $pro_obj->EmpID() ?></p><br>
                                        <p><strong>Proposal Subject:</strong> </p>
                                        <p>-<?php echo $pro_obj->subject() ?></p><br>
                                        <p><strong>Submit Date:</strong> </p>
                                        <p>-<?php echo $pro_obj->Date() ?></p><br>
                                        <p><strong>Category:</strong> </p>
                                        <p>-<?php echo $pro_obj->Category() ?></p><br>
                                        <p><strong>Amount:</strong> </p>
                                        <p>-<?php echo $pro_obj->Amount() ?></p><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Document Approval Workflow (Footer) -->
                        <form method="post">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-4">Document Approval Workflow</h5>
                                    <p><strong>viewed By:</strong> </p>
                                    <p>-<?php echo $pro_obj->FID() ?></p><br>
                                    <p><strong>Date:</strong> </p>
                                    <p>-<?php echo $pro_obj->Date() ?></p><br>
                                    <p><strong>Checked By:</strong> </p>
                                    <p>-<?php echo $pro_obj->MngID() ?></p><br>
                                    <p><strong>Date:</strong> </p>
                                    <p>-<?php echo $pro_obj->Date() ?></p><br>

                                        <?php if ($position_type == "user") { ?>
                                        <button class="btn btn-success disabled">Status - </button>

                                        <!--<button class="btn btn-success">Add Comment</button>-->
                                        <?php }if (($position_type == "manager") || ($position_type == "finance team")) { ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal" >
                                            Add Comment
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Enter Your Comment</h5>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-outline">
                                                            <textarea class="form-control" rows="4" name="cmmt"></textarea>
                                                            <label class="form-label" for="textAreaExample">Message</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="save_cmmt">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end cmmt btton -->
                                        <?php } if (($position_type == "user") && ($status != FALSE)) { ?>
                                        <button class="btn btn-success" name="edit">Edit</button>
                                        <?php } if ($position_type == "manager") { ?>
                                        <button class="btn btn-success" name="aprv">Approve</button>
                                        <button class="btn btn-danger" name="rjct">Reject</button>
                                        <?php } ?>
                                        <?php if ($ap) { ?>
                                        <div class="alert alert-success mt-2" role="alert">
                                            Successfully Approved!
                                        </div>
                                        <?php } ?>
                                        <?php if ($re) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            Check Again!
                                        </div>
                                        <?php } ?>
                                        <?php if ($is_cmmt !== FALSE) { ?>
                                        <div class="alert alert-success mt-2" role="alert">
                                            Successfully Comment Added!
                                        </div>
                                        <?php } ?>

                                </div>
                        </form>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>    
                    <div class="col-lg-6">
                        <!-- Proposal Name -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="mb-3">Proposal Description</h4>
                                        <h6>By User</h6><hr class="mt-0 p-0">
                                        <p>-<?php echo $pro_obj->description(); ?></p><br>
                                        <h6>By Finance team Member</h6><hr class="mt-0 p-0">
                                        <p>-<?php echo $pro_obj->descriptionF(); ?></p><br>
                                        <h6>By Manager</h6><hr class="mt-0 p-0">
                                        <p>-<?php echo $pro_obj->descriptionM(); ?></p><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </section>
    </body>
</html>
