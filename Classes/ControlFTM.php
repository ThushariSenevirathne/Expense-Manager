<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'AddInconeExpences.php';
    $IECls = new Classes\AddInconeExpences();

    require_once 'Notification.php';
    $noti = new Classes\Notification();

    require_once 'DbConnector.php';
    $dbcon = new Classes\DbConnector();


    if (isset($_POST['Add_Income'])) {

        require_once 'IncomeData.php';
        $income = new Classes\IncomeData();

        $income->setCategory($_POST['iCat']);
        $income->setSubject($_POST['iTitle']);
        $income->setAmount($_POST['iamount']);
        $income->setDescription($_POST['ides']);

        $FID = $_POST['fid'];
        $Date = date("Y-m-d");
        $Time = date("H:i:s");

        $Category = $income->getCategory();
        $subject = $income->getSubject();
        $Amount = $income->getAmount();
        $Description = $income->getDescription();

        if ($IECls->Addincome($FID, $Category, $subject, $Amount, $Description, $Date, $Time) > 0) {

            $con = $dbcon->getConnection();
            $InID = $IECls->LastInID();
            $query = "SELECT * FROM income ORDER BY InID DESC LIMIT 1";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $in) {
                $InID = $in->InID;
                $FID = $in->FID;
                $Amount = $in->Amount;
            }
            $msj = "Sucessfully Added Income by " . $FID . " Amount : $" . $Amount;
            $noti->AddInSuccess($InID, $FID, $msj, $Date, $Time);
            $noti->AddInSuccessToM($InID, $FID, $msj, $Date, $Time);
            header("Location: ../dashBoardF.php");
        }else{
            header("Location: ../dashBoardF.php");
        }
        
    } elseif (isset($_POST['Add_expenses'])) {

        $Amount = 0;
        $emp = '';
        $PID = $_POST['epid'];

        $con = $dbcon->getConnection();
        $query = "SELECT Amount,EmpID FROM proposal WHERE ProID='" . $PID . '"';
        $pstmt = $con->prepare($query);
        $pstmt->execute();
        $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($rs as $in) {
            $Amount = $in->Amount;
            $emp = $in->EmpID;
        }

        $FID = $_POST['fid'];
        $Date = date("Y-m-d");
        $Time = date("H:i:s");
        if ($IECls->Addexpense($PID, $FID, $Amount, $Date, $Time) > 0) {
            $con = $dbcon->getConnection();
            
            $query = "UPDATE proposal SET Status='Completed' WHERE ProID =$PID";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            
            $query = "SELECT * FROM expense ORDER BY ExID DESC LIMIT 1";
            $pstmt = $con->prepare($query);
            $pstmt->execute();
            $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $in) {
                $ExID = $in->ExID;
                $FID = $in->FID;
                $Amount = $in->Amount;
            }
            $msj = "Sucessfully Added Expense by " . $FID . " Amount : $" . $Amount;
            $noti->AddExSuccess($ExID, $FID, $msj, $Date, $Time);
            $noti->AddExSuccessToM($ExID, $FID, $msj, $Date, $Time);
            $noti->AddExSuccessToE($ExID, $FID, $emp, $msj, $Date, $Time);
            header("Location: ../dashBoardF.php");
        }else{
            header("Location: ../dashBoardF.php");
        }
        
    }
}else{
    header("Location: ../Index.php");
}
