<?php include('header.php') ?>

<?php

include 'config.php';

if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
    
    // Retrieve the user's data based on the ID
    $sql = "SELECT * FROM ordertracking WHERE orderID=$orderID";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
    <section class="panel important">
        <h2>Update <?php echo $row['TrackingCode']; ?></h2>
        <form action="update_tracking.php" method="POST" >
            <div class="twothirds">

                <input type="hidden" name="TrackingID" value="<?php echo $row['TrackingID']; ?>">
 
                
                <label for="Status">Tracking Status</label>
            <select name="Status" id="Status">
            <option value="<?php echo $row['Status']; ?>"><?php echo $row['Status']; ?></option>
                <option value="1">Confirm</option>
                <option value="2">Picked Up</option>
                <option value="3">In Transit</option>
                <option value="4">Delivered</option>

            </select>
                <input type="hidden" name="Location" id="Location" placeholder="" value="<?php echo $row['Location']; ?>"require/>
                <input type="hidden" name="UpdateDateTime" id="UpdateDateTime" value="<?php echo $row['UpdateDateTime']; ?>" placeholder="" require/>

            </div>
            <div class="onethird">
                <div>
                <input type="submit" value="Submit" />
                </div>
            </div>
        </form>

    </section>

<?php
    } else {
        echo "User not found";
    }

} else {
    echo "No user ID specified";
}

$conn->close();
?>
<?php include('footer.php') ?>


<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["TrackingID"];
    $Status = $_POST["Status"];
    $Location = $_POST["Location"];
    $UpdateDateTime = $_POST["UpdateDateTime"];

    $sql = "UPDATE `ordertracking` SET  Status='$Status', Location='$Location', UpdateDateTime='$UpdateDateTime' WHERE TrackingID=$id ";

    if ($conn->query($sql) === TRUE) {
        header("Location: order.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>