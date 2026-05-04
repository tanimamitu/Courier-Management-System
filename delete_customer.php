<?php
include 'config.php';

if (isset($_GET['customerid'])) {
    $customerid = $_GET['customerid'];

    // SQL to delete a record
    $sql = "DELETE FROM customers WHERE customerid=$customerid";

    if ($conn->query($sql) === TRUE) {
        header("Location: customers.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No user ID specified";
}

$conn->close();

 ?>