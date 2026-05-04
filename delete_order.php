<?php
include 'config.php';

if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];

    // SQL to delete a record
    $sql = "DELETE FROM orders WHERE orderID=$orderID";

    if ($conn->query($sql) === TRUE) {
        header("Location: order.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No user ID specified";
}

$conn->close();

 ?>
