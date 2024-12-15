<?php
require_once 'Classes/EditPro.php';

if ($_SESSION['logged'] !== TRUE) {
    header('Location: index.php');
}//can't log directly in another pages
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        <title>Edit Profile</title>
    </head>
    <body>
        <section style="background-color: #eee; padding-top: 50px">    
            <div class="container py-3">

                <!--nav bar-->
                <br>
                <div class="row">
                    <div class="col-lg-1"></div> 
                    <div class="col-lg-10">
                        <div class="card mb-4">

                            <div class="card-body text-center"><H6>Create your profile</h6></div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div> 
                </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="was-validation" novalidate>
                    
                    <!--change password-->
                    <div class="row">
                        <div class="col-lg-1"></div>    
                        <div class="col-lg-10">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0" style="padding-bottom: 5px">Edit password</p></div><hr style="padding: 5px">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Enter password</p></div>
                                        <div class="col-sm-8"><input type="password" name="password" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your password" required/><br></div>  
                                        <?php echo $passErr; 
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Confirm password</p></div>
                                        <div class="col-sm-8"><input type="password" name="CmPassword" id="form3Example3" class="form-control form-control-lg" placeholder="Confirm your password" required/><br></div>
                                        <?php echo $confirm_passErr; 
                                        echo $notMatched_Err;
                                        echo $SpassErr;?>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                            </div></div></div>


                    <!--user Information-->
                    <div class="row">
                        <div class="col-lg-1"></div>    
                        <div class="col-lg-10">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0" style="padding-bottom: 5px">Enter your details</p></div><hr style="padding: 5px">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">User Name</p></div>
                                        <div class="col-sm-8"><input type="text" name="UserName" id="form3Example3" class="form-control form-control-lg" placeholder="<?php echo $name ?>" disabled /></div>
                                    </div><hr style="opacity: .05">
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Full Name</p></div>
                                        <div class="col-sm-8"><input type="text" name="FullName" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your Full Name" required/></div>
                                    </div><?php echo $nameErr;?><hr style="opacity: .05">
                                    
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Add profile photo</p></div>
                                        <div class="col-sm-8"><input class="form-control" name="photo" type="file" id="formFileMultiple" multiple required/></div>
                                    </div><?php echo $photoErr;
                                    echo $pE1;
                                    echo $pE2;
                                    echo $pE3;
                                    echo $pE4;
                                    echo $pE5;
                                    echo $pE6;?><hr style="opacity: .05">
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Position</p></div>
                                        <div class="col-sm-8"><input type="text" name="Position" id="form3Example3" class="form-control form-control-lg" placeholder="<?php echo $position ?>" disabled=""/></div>
                                    </div><hr style="opacity: .05">
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Email</p></div>
                                        <div class="col-sm-8"><input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your Email" required/></div>
                                    </div><?php echo $emailErr;
                                    echo $emailVErr;?><hr style="opacity: .05">
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Phone Number(Office)</p></div>
                                        <div class="col-sm-8"><input type="number" name="phNo" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your office Number" required /></div>
                                    </div><?php echo $phNoErr;
                                    echo $phNoCErr;
                                    ?><hr style="opacity: .05">
                                    <div class="row">
                                        <div class="col-sm-4"><p class="mb-0">Phone Number(Personal)</p></div>
                                        <div class="col-sm-8"><input type="number" name="PphNo" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your mobile Number" required/></div>
                                    </div><?php echo  $PphNoErr;
                                    echo  $PphNoCErr;?>
                                    <div class="row" style="padding-top: 20px;">
                                        <div class="d-grid gap-2 col-12 mx-auto"><button class="btn btn-primary" name="save" type="submit">Save Data</button>
                                        </div><br>
                                    </div>

                                </div>



                            </div>
                            <div class="col-lg-1"></div>    



                        </div>
                    </div>
            </div>
        </form>
    </section>



    <?php
    // put your code here
    ?>
</body>
</html>
