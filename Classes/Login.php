<?php

namespace Classes;

session_start();

use PDOException;
use PDO;
use Classes\DbConnector;

require 'DbConnector.php';



$Err = $Err2 = $Err3 = $Err5 = "";
$uname = $pass = $u_id = $position="";
$_SESSION['logged'] = FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["Username"])) { 
        $Err2 = " <p style='color:red'>* User Name Is required </p>";
        $Err = "2";
    } else {
        $uname = trim($_POST["Username"]);
    }

    if (empty($_POST["password"])) {
        $Err3 = " <p style='color:red'>* Password Is required </p>";
        $Err = " 3";
    } else {
        $pass = trim($_POST["password"]);
    }


    if (!empty($uname) && !empty($pass)) {

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $sql = " SELECT password FROM employee WHERE Username='$uname' ";//employee


        $pstmt = $con->prepare($sql);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($rs as $value) {
            $pword = $value->password;
        }
        if ($pword != null) {
            if ($pass == $pword) {
                $sql = " SELECT * FROM employee WHERE Username='$uname' ";//employee

                $pstmt = $con->prepare($sql);
                $pstmt->execute();
                $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($rs as $value) {
                    $fullName = $value->FullName;
                    $possision = $value->Type;
                    $email = $value->email;
                    $PhoneNumOffice = $value->PhoneNumOffice;
                    $PhoneNumPersonal = $value->PhoneNumPersonal;
                    $u_id = $value->EmpID;
                    $Type = $value->Type;
                    $uname = $value->Username;
                 
                    // sessio variable
                    $_SESSION['logged'] = TRUE;
                    $_SESSION["u_id"] = $u_id;
                    $_SESSION["type"] = $Type;
                    $_SESSION["Username"] = $uname;
                   
                }

                //echo "$fullName";

                if ($fullName == NULL && $email == NULL && $PhoneNumOffice == 0 && $PhoneNumPersonal == 0) { //employee table doesn't have fullName column 
                    header("Location: editProfile.php");
                } else if ($possision == "Manager") {
                    header("Location: DashMng.php");
                } else if ($possision == "Finance Team Member") {
                    header("Location: DashFTM.php");
                } else if ($possision == "Employee") {
                    header("Location: DashEmp.php");
                } else {
                    $Err = "6";
                }
            } else {
                $Err5 = " <p style='color:red'>* User Name or Password incorrect </p>";
                $Err = "5";
            }
        }
    } else {
        $Err = "4";
    }
} else {
    $Err = "1";
}

