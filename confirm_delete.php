<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL to delete a record
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: users.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No user ID specified";
}

$conn->close();

 ?>