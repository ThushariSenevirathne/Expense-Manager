<?php

namespace Classes;

use PDOException;
use PDO;

require 'DbConnector.php';

use Classes\DbConnector;

class AddPromoDeleteMember {
    
    public function AddMember($EmpID,$password,$Username,$Type,$Date) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = 'INSERT INTO employee(EmpID,password,Username,Type,RegistedDate) VALUES (?,?,?,?,?)';
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $EmpID);
        $pstmt->bindValue(2, $password);
        $pstmt->bindValue(3, $Username);
        $pstmt->bindValue(4, $Type);
        $pstmt->bindValue(5, $Date);
        $pstmt->execute();
        
        if ($pstmt->rowCount()>0){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    public function PromoteMem($Username,$Type) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = 'UPDATE employee SET Type=? WHERE Username=?';
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $Type);
        $pstmt->bindValue(2, $Username);
        $pstmt->execute();
        
        if ($pstmt->rowCount()>0){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    public function RemoveMem($Username) {
        $dbcon = new DbConnector();
        $con = $dbcon->getConnection();

        $query = 'UPDATE employee SET RegistedDate="NotFound",Type="NotFound" WHERE Username=?';
        $pstmt = $con->prepare($query);
        $pstmt->bindValue(1, $Username);
        $pstmt->execute();
        
        if ($pstmt->rowCount()>0){
            return 1;
        }else{
            return 0;
        }
        
    }
    
}
