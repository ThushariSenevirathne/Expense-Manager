<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/*require 'Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector();
*/
include 'Classes/Login.php';
?>
<html>
    <head>
        <meta charset="UTF-8">


        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet"/>

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>

        <title>Login</title>
    </head>
    <body >

        <section>

            <div class="px-4 py-5 px-md-5 text-center text-lg-start">
                <div class="container">
                    <div class="row gx-lg-5 align-items-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <img src="images/c.jpg" class="img-fluid" alt="Sample image">
                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <form action=<?php echo $_SERVER['PHP_SELF'];?> method="POST" class="needs-validation" >

                                        <!-- User Name -->
                                        <div class="mb-4">
                                            <label for="validationDefault03" class="form-label">User Name</label>
                                            <input type="text" class="form-control"   placeholder="Enter User Name" name="Username" >
                                           <?php echo  $Err2; ?>  
                                        </div>

                                        <!-- Password input -->
                                        <div class="mb-4">
                                            <label class="form-label" for="form3Example3">Password</label>
                                            <input type="Password" id="form3Example3" class="form-control form-control-lg" placeholder="Enter Password" name="password"/><br>
                                            <?php echo  $Err3; ?>
                                        </div>
                                        
                                        <?php echo  $Err5; ?>

                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button class="btn btn-primary" name="submit" type="submit">LOGIN</button>
                                        </div>  
                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>

        </section>
        <?php
// put your code here
        ?>
    </body>
</html>
