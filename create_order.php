<?php include("header.php");?>



<section class="panel important">
    <h2>Create New order</h2>
    <form action="" method="POST" >
        <div class="twothirds">
            <label for="name">PickupAddress</label>
            <input type="text" name="PickupAddress" id="PickupAddress" placeholder=""  require/>
            <label for="DeliveryAddress">DeliveryAddress</label>
            <input type="text" name="DeliveryAddress" id="DeliveryAddress" placeholder="" require/>
            <label for="PickupDateTime">Pickup Date</label>
            <input type="date" name="PickupDateTime" id="PickupDateTime" placeholder="" require/>
            <label for="DeliveryDateTime">Delivery Date</label>
            <input type="date" name="DeliveryDateTime" id="DeliveryDateTime" placeholder="" require/>
            <label for="customerid">Customer Id</label>
            <input type="text" name="customerid" id="customerid" placeholder="" require/>
            <label for="courierid">Courier Id</label>
            <input type="text" name="courierid" id="courierid" placeholder="" require/>


            <label for="Status">Order Status</label>
            <select name="Status" id="Status">
            <option value="Pending">Pending</option>
            <option value="Picked Up">Picked Up</option>
            <option value="InTransit">In Transit</option>
            <option value="Delivered">Delivered</option>

            </select>
        </div>
        <div class="onethird">
            <div>
            <input type="submit" value="Submit" />
            </div>
        </div>
    </form>

</section>

<?php include("footer.php");?>


<?php 

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $PickupAddress = $_POST["PickupAddress"];
    $DeliveryAddress = $_POST["DeliveryAddress"];
    $PickupDateTime = $_POST["PickupDateTime"];
    $DeliveryDateTime = $_POST["DeliveryDateTime"];
    $customerid = $_POST["customerid"];
    $courierid = $_POST["courierid"];
    $Status = $_POST["Status"];

    $sql = "INSERT INTO `orders` (customerid, courierid, PickupAddress, DeliveryAddress,Status,PickupDateTime,DeliveryDateTime) VALUES 
    ($customerid, $courierid, '$PickupAddress','$DeliveryAddress','$Status','$PickupDateTime','$DeliveryDateTime')";

    if ($conn->query($sql) === TRUE) {
        header("Location: order.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();


?>