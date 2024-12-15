<?php

namespace Classes;

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

class AddInconeExpences {

    public function Addincome( $FID, $Category, $subject, $Amount, $Description, $Date, $Time) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = 'INSERT INTO income(FID,Category,Subject,Amount,Description,Date,Time) VALUES (?,?,?,?,?,?,?)';
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $FID);
        $pstmt->bindValue(2, $Category);
        $pstmt->bindValue(3, $subject);
        $pstmt->bindValue(4, $Amount);
        $pstmt->bindValue(5, $Description);
        $pstmt->bindValue(6, $Date);
        $pstmt->bindValue(7, $Time);
        $pstmt->execute();
        
        if ($pstmt->rowCount()>0){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    public function LastInID() {

        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();
        $LastInID = null;

        $query = "SELECT InID FROM income ORDER BY itemID DESC LIMIT 1";
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($rs as $in) {
            $LastInID = $in->EmpID;
        }        
        return $LastInID;
    }
    
   
    public function Addexpense( $ProID, $FID, $Amount, $Date, $Time) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = 'INSERT INTO expense(ProID,FID,Amount,Date,Time) VALUES (?,?,?,?,?)';
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $ProID);
        $pstmt->bindValue(2, $FID);
        $pstmt->bindValue(3, $Amount);
        $pstmt->bindValue(4, $Date);
        $pstmt->bindValue(5, $Time);
        $pstmt->execute();
        
        if ($pstmt->rowCount()>0){
            return 1;
        }else{
            return 0;
        }
    }
   

}
