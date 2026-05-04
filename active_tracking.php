<?php include("header.php");?>



<section class="panel important">
    <h2>Active Tracking Status</h2>
<?php


?>
    <form action="" method="POST" >
        <div class="twothirds">

            <label for="Status">Tracking Status</label>
            <select name="Status" id="Status">
            <option value="1">Confirm</option>
            <option value="2">Picked Up</option>
            <option value="3">In Transit</option>
            <option value="4">Delivered</option>
            
            </select>
        </div>
        <div class="onethird">
            <div>
            <input type="submit" value="Active" />
            </div>
        </div>
    </form>

</section>


<?php include("footer.php");?>


<?php 

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $orderID = $_GET['orderID'];
    $Status = $_POST["Status"];
    $TrackingCode =  time();
    $Location = 'n/a';
    $UpdateDateTime = date("Y-m-d");


        $sql = "INSERT INTO `ordertracking` (orderID, Status, TrackingCode, Location,UpdateDateTime) VALUES ($orderID, $Status, $TrackingCode,'$Location','$UpdateDateTime')";

        if ($conn->query($sql) === TRUE) {
            header("Location: order.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

}
$conn->close();


?>