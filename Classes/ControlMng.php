<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'AddPromoDeleteMember.php';
    $adpMem = new Classes\AddPromoDeleteMember();

    require_once 'User.php';
    $user = new Classes\User();

    require_once 'Notification.php';
    $noti = new Classes\Notification();

    require_once 'DbConnector.php';
    $dbcon = new Classes\DbConnector();


    if (isset($_POST['Add_member'])) {

        $user->setUsername($_POST["uname"]);
        $user->setPassword($_POST["pword"]);
        $user->setType($_POST["Role"]);

        $EmpID = '6';
        $password = $user->getPassword();
        $Username = $user->getUsername();
        $Type = $user->getType();
        $Date = date("Y-m-d");

        if ($adpMem->AddMember($EmpID, $password, $Username, $Type, $Date) > 0) {
            header("Location: ../dashBoardM.php");
        }
    } elseif (isset($_POST['promote_member'])) {

        $user->setUsername($_POST["uname"]);
        $user->setType($_POST["role"]);

        $Type = $user->getType();
        $Username = $user->getUsername();

        if ($adpMem->PromoteMem($Username, $Type) > 0) {
            header("Location: ../dashBoardM.php");
        }
    } elseif (isset($_POST['remove_member'])) {

        $user->setUsername($_POST["uname"]);
        $uname = $user->getUsername();
        echo $_POST["uname"];
        if ($adpMem->RemoveMem($uname) > 0) {

            echo $_POST["uname"];
            header("Location: ../dashBoardM.php");
        }
    }
} else {
    header("Location: ../dashBoardM.php");
}
