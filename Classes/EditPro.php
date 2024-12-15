<?php

namespace Classes;

session_start();

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

class EditPro {
    private $want_id;
    private $possion_type;
    private $is_reject = FALSE;

    public function set_possion($ptype) {
        $this->possion_type = $ptype;
    }


    public function set_id($id){
        $this->want_id = $id;
      }

    public function description() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposal WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Description'];
            return $rs;
        }
    }

    public function approve() {

        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        $Status = "Approved";

        $sql = "UPDATE proposal SET Status = '$Status' WHERE ProID = '{$this->want_id}'";

        if ($con->exec($sql) === FALSE) {
            echo 'some errors plz check the code ';
        }
    }

    public function reject() {

        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        $Status = "Rejected";

        $sql = "UPDATE proposal SET Status = '$Status' WHERE ProID = '{$this->want_id}'";

        if ($con->exec($sql) == FALSE) {
            echo 'some errors plz check the code ';
        }
    }

    public function descriptionF() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposalmodify WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['DescriptionF'];
            return $rs;
        }
    }

    public function descriptionM() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposalmodify WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['DescriptionM'];
            return $rs;
        }
    }

    public function Addcomment($cmmt,$pssn) {

        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        if ($pssn == "manager") {
            $sql = "UPDATE proposalmodify SET DescriptionM ='".$cmmt."' WHERE ProID = '{$this->want_id}'";
            if ($con->exec($sql) !== FALSE){
                return TRUE;
            }
        }elseif ($pssn == "finance team") {
            $sql = "UPDATE proposalmodify SET DescriptionF ='".$cmmt."' WHERE ProID = '{$this->want_id}'";
            if ($con->exec($sql) !== FALSE){
                return TRUE;
            }
        }
    }

    public function EmpID() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT employee.Username FROM employee WHERE employee.EmpID = (SELECT proposal.EmpID FROM proposal WHERE proposal.ProID = '" . $this->want_id . "')";


        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Username'];
            return $rs;
        }
    }

    public function subject() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposal WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Subject'];
            return $rs;
        }
    }

    public function SDate() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposal WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Date'];
            return $rs;
        }
    }

    public function Category() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposal WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Category'];
            return $rs;
        }
    }

    public function Amount() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposal WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Amount'];
            return $rs;
        }
    }

    public function Date() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposal WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Date'];
            return $rs;
        }
    }

    public function FID() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT employee.Username FROM employee WHERE employee.EmpID=(SELECT financeteam.EmpID FROM financeteam WHERE financeteam.FID=(SELECT proposalmodify.FID FROM proposalmodify,proposal WHERE proposalmodify.ProID = proposal.ProID AND proposal.ProID = '" . $this->want_id . "')) LIMIT 1;";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Username'];
            return $rs;
        }
    }

    public function DateF() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposalmodify WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Date'];
            return $rs;
        }
    }

    public function DateM() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT * FROM proposalmodify WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        // create prepare statement
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Date'];
            return $rs;
        }
    }

    public function MngID() {
        //create db conection
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();

        //$want_id = "p002";
        // set quary
        $sql_1 = "SELECT employee.Username FROM employee WHERE employee.EmpID=(SELECT manager.EmpID FROM manager,proposalmodify WHERE manager.MngID = proposalmodify.MngID AND proposalmodify.PM_ID=(SELECT proposalmodify.PM_ID FROM proposalmodify,proposal WHERE proposalmodify.ProID = proposal.ProID AND proposal.ProID = '" . $this->want_id . "')) LIMIT 1";
        // create prepare statement
       
        $pstmt = $con->query($sql_1);
        while ($row = $pstmt->fetch()) {
            $rs = $row['Username'];
            return $rs;
        }
    }
    
    public function is_rejected(){
        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();
        
        $sql = "SELECT Status FROM  proposal WHERE ProID = '" . $this->want_id . "' LIMIT 1";
        $result = $con->query($sql);
        while ($row = $result->fetch()){
            if ($row['Status'] != null) {
                $this->is_reject = TRUE;
                return $this->is_reject;
            }
        }
        return $this->is_reject;
    }

    public function Edit() {

        $db_obj = new DbConnector();
        $con = $db_obj->getConnection();  
    }

   }

   
   //Thushari
   
   
   
   $nameErr = $emailErr = $passErr = $confirm_passErr = $phNoErr = $PphNoErr = $photoErr = $notMatched_Err = $SpassErr = $phNoCErr = $PphNoCErr = $emailVErr = $pE1 = $pE2 = $pE3 = $pE4 = $pE5 = $pE6 = "";
$name = $email = $pass = $confirm_pass = $PphNo = $phNo = $photo = $notMatched = $Spass = $phNoC = $PphNoC = $emailV = $Fname = "";
if ($_SESSION["u_id"]) {
    //echo "Test clicked";
    $con_obj = new DbConnector();
    $con = $con_obj->getConnection();
    $sql = "SELECT Username, Type FROM employee WHERE EmpID = '{$_SESSION['u_id']}' LIMIT 1"; //employee table
    $result = $con->query($sql);


    while ($row = $result->fetch()) {
        $name = $row["Username"];
        $position = $row["Type"];
    }
}

if (isset($_POST["save"])) {
    if (empty($_POST["password"])) {
        $passErr = " <p style='color:red'>* Password Is required </p>";
    } else {
        $pass = trim($_POST["password"]);

        if (strlen($pass) <= 7) {
            $SpassErr = " <p style='color:red'>* Password is not strong </p>";
        } else {
            $Spass = trim($_POST["password"]);
        }
    }
    if (empty($_POST["CmPassword"])) {
        $confirm_passErr = " <p style='color:red'>*Confirm Password Is required </p>";
    } else {
        $confirm_pass = trim($_POST["CmPassword"]);
    }
    if ($_POST["password"] !== $_POST["CmPassword"]) {
        $notMatched_Err = " <p style='color:red'>* Password Do not matched </p>";
    } else {
        $notMatched = trim($_POST["CmPassword"]);
    }

    if (empty($_POST["FullName"])) { //employee table doesn't have fullNme column
        $nameErr = " <p style='color:red'>* Full Name Is required </p>";
    } else {
        $Fname = trim($_POST["FullName"]);
    }


    if (isset($_POST["save"])) {


        $target_dir = "Images/";
        $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $name . "." . $imageFileType;
        $uploadOk = 1;


        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if ($check !== false) {
                $pE1 = "<p style='color:red'>*File is an image - " . $check["mime"] . ".</p>";
                $uploadOk = 1;
            } else {
                $pE2 = "<p style='color:red'>*File is not an image.</p>";
                $uploadOk = 0;
            }
        }


        if (file_exists($target_file)) {
            $pE3 = "<p style='color:red'>*Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        if ($_FILES["photo"]["size"] > 500000) {
            $pE3 = "<p style='color:red'>*Sorry, your file is too large.</p>";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $pE4 = "<p style='color:red'>*Please upload JPG, JPEG, PNG & GIF files.</p>";
            $uploadOk = 0;
        }


        if ($uploadOk == 0) {
            $pE5 = "<p style='color:red'>*Sorry, your file was not uploaded.</p>";
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                //echo "The file " . htmlspecialchars($name . "." . $imageFileType) . " has been uploaded.";
            } else {
                $pE6 = "<p style='color:red'>*Sorry, there was an error uploading your file.</p>";
            }
        }
    } 
    if (empty($_POST["email"])) {
        $emailErr = " <p style='color:red'>* Email Is required </p>";
    } else {
        $email = trim($_POST["email"]);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailV = trim($_POST["email"]);
        } else {
            $emailVErr = " <p style='color:red'>* Invalid email </p>";
        }
    }

    if (empty($_POST["phNo"])) {
        $phNoErr = " <p style='color:red'>* Phone No Is required </p>";
    } else {
        $phNo = trim($_POST["phNo"]);

        if (strlen($phNo) !== 10) {
            $phNoCErr = " <p style='color:red'>* Invalid Phone No </p>";
        } else {
            $phNoC = trim($_POST["phNo"]);
        }
    } if (empty($_POST["PphNo"])) {
        $PphNoErr = " <p style='color:red'>* Personal phone No Is required </p>";
    } else {
        $PphNo = trim($_POST["PphNo"]);

        if (strlen($PphNo) !== 10) {
            $PphNoCErr = " <p style='color:red'>* Invalid Phone No </p>";
        } else {
            $PphNoC = trim($_POST["PphNo"]);
        }
    }


    if (!empty($pass) && !empty($confirm_pass) && !empty($Fname)  && !empty($email) && !empty($phNo) && !empty($PphNo)) {

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        
      $sql= "UPDATE employee SET password= '$pass' , FullName ='$Fname', email ='$email', PhoneNumOffice='$phNo',  PhoneNumPersonal= '$PphNo' WHERE EmpID = '{$_SESSION['u_id']}' LIMIT 1";
      
      if ($con->exec($sql)!== FALSE) {
          
        
          
            if ($position == "Manager") {
      header("Location: DashMng.php");
      } else if ($position == "FTmember") {
      header("Location: DashFTM.php");
      } else if ($position == "emp") {
      header("Location: DashEmp.php");
      } else {
      $Err = "6";
      }
                }
       // echo "Data saved to the database successfully.";
    } else {
        echo "error";
     
    
    //$con->close();
    }


}