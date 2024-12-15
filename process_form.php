<?php

include_once 'Classes/DbConnector.php';

if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $empID = $_POST['empID'];
    $subject = $_POST['subject'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $status = 'added';

    // Assuming your dbconnector.php has a class and method for database connection
    $dbcon = new Classes\DbConnector();
    $conn = $dbcon->getConnection();

    // Perform the SQL query to insert data into the database
    $query = "INSERT INTO proposal (EmpID, Category, Subject, Amount, Date, Description, Status) 
              VALUES ('$empID', '$category', '$subject', '$amount', '$date', '$description', '$status')";

    if ($conn->query($query) === TRUE) {
        echo "Proposal added successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

