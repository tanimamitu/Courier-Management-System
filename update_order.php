<?php include('header.php') ?>
<?php

include 'config.php';

if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
    
    // Retrieve the user's data based on the ID
    $sql = "SELECT * FROM orders WHERE orderID=$orderID";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
    <section class="panel important">
        <h2>Update order Id  <?php echo $row['orderID']; ?></h2>
        <form action="update_order.php" method="POST" >
            <div class="twothirds">
            <input type="hidden" name="orderID" id="orderID" value="<?php echo $row['orderID']; ?>" placeholder="" require/>
                <input type="text" name="customerid" id="customerid" value="<?php echo $row['customerid']; ?>" placeholder="" require/>
                <input type="text" name="courierid" id="courierid" value="<?php echo $row['courierid']; ?>" placeholder="" require/>
                <label for="name">PickupAddress</label>
                <input type="text" name="PickupAddress" id="PickupAddress" placeholder="" value="<?php echo $row['PickupAddress']; ?>" require/>
                <label for="email">DeliveryAddress</label>
                <input type="text" name="DeliveryAddress" id="DeliveryAddress" placeholder="" value="<?php echo $row['DeliveryAddress']; ?>" require/>
                <label for="phone">Pickup Date</label>
                <input type="date" name="PickupDateTime" id="PickupDateTime" placeholder="" value="<?php echo $row['PickupDateTime']; ?>"require/>
                <label for="DeliveryDateTime">Delivery Date</label>
                <input type="date" name="DeliveryDateTime" id="DeliveryDateTime" value="<?php echo $row['DeliveryDateTime']; ?>" placeholder="" require/>
                <input type="hidden" name="Status" id="Status" value="<?php echo $row['Status']; ?>" placeholder="" require/>
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



<?php include("footer.php");?>

<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST["orderID"];
    $customerid =  $_POST["customerid"];
    $courierid =  $_POST["courierid"];
    $PickupAddress = $_POST["PickupAddress"];
    $DeliveryAddress = $_POST["DeliveryAddress"];
    $Status = $_POST["Status"];
    $PickupDateTime = $_POST["PickupDateTime"];
    $DeliveryDateTime = $_POST["DeliveryDateTime"];

    
    $sql = "UPDATE `orders` SET `customerid`='$customerid',`courierid`='$courierid',`PickupAddress`='$PickupAddress',`DeliveryAddress`='$DeliveryAddress',`Status`='$Status',`PickupDateTime`='$PickupDateTime',`DeliveryDateTime`='$DeliveryDateTime' WHERE orderID=$Id ";

    if ($conn->query($sql) === TRUE) {
        header("Location: order.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>