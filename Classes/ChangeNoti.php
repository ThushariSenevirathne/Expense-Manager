<?php

require_once 'DbConnector.php';
$dbcon = new Classes\DbConnector();

$conn = $dbcon->getConnection();
$nid = "1";

$query = 'UPDATE notification SET Status="1" WHERE Nid="' . $_GET["m"] . '"';
echo $query;
$pstmt = $conn->prepare($query);
$pstmt->execute();

header('Location: '.$_GET["url"]);


