<?php

namespace Classes;

session_start();

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector();
$con = $dbcon->getConnection();
$lise = array();

$query = "SELECT employee.Username, feedback.Msj, feedback.date FROM employee, feedback WHERE employee.EmpID = feedback.EmpID";
$result_f = $con->query($query);

while (false) {
    $lise['name'] = $row['Username'];
    $lise['msg'] = $row['Msj'];
    $lise['date'] = $row['date'];
}

$name = $FeedErr = $Feed = "";
$uid = 1; //$_SESSION["u_id"];
//if ($_SESSION["u_id"]) {
if (false) {

    $con_obj = new DbConnector();
    $con = $con_obj->getConnection();
    //$sql = "SELECT Username FROM employee WHERE EmpID = '{$_SESSION['u_id']}' LIMIT 1";
    $sql = "SELECT Username FROM employee WHERE EmpID = '1' LIMIT 1";
    $result = $con->query($sql);


    while ($row = $result->fetch()) {
        $name = $row["Username"];
    }
}



if (isset($_POST["add"])) {

    if (empty($_POST["FEED"])) {
        $FeedErr = " <p style='color:red; font-family:Open Sans; font-weight: bold;'>* Feedback is required </p>";
    } else {
        $Feed = trim($_POST["FEED"]);
        $Feed = " <p style='color:green; font-family:Open Sans; font-weight: bold; ' >Thank you for your feedback </p>";

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $currentDate = date("Y-m-d");
        

        $sql = 'INSERT INTO feedback (EmpID,Msj, date) VALUES ("' . $uid . '","' . trim($_POST["FEED"]) . '","' . $currentDate . '")';


        if ($con->exec($sql) !== FALSE) {
            
        }
    }
}
?> 