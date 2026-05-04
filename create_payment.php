<?php include("header.php");?>



<section class="panel important">
    <h2>Payment <?php echo date("Y-m-d");?></h2>
<?php


?>
    <form action="" method="POST" >
        <div class="twothirds">
            <label for="Amount">Amount</label>
            <input type="text" name="Amount" id="Amount" placeholder=""  require/>
            <label for="paymentStatus">Payment Status </label>
            <select name="paymentStatus" id="paymentStatus">
            <option value="">----Select Status----</option>
            <option value="Paid">Paid</option>
            <option value="Panding">Panding</option>
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
    $Amount = $_POST["Amount"];
    $paymentStatus = $_POST["paymentStatus"];
    $paymentDateTime = date("Y-m-d");


        $sql = "INSERT INTO `payment` (orderID, Amount, paymentStatus, paymentDateTime) VALUES ($orderID, '$Amount', '$paymentStatus','$paymentDateTime')";

        if ($conn->query($sql) === TRUE) {
            header("Location:view_order.php?orderID=".urlencode($_GET['orderID']));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

}
$conn->close();


?>