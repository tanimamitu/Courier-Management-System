<?php
include 'config.php';

if (isset($_GET['courierid'])) {
    $courierid = $_GET['courierid'];

    // SQL to delete a record
    $sql = "DELETE FROM couriers WHERE courierid=$courierid";

    if ($conn->query($sql) === TRUE) {
        header("Location: courier.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No user ID specified";
}

$conn->close();

 ?>