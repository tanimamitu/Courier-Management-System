<?php include('header.php') ?>

<?php
if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
    
    // Retrieve the user's data based on the ID
    $sql = "SELECT * FROM payment WHERE orderID=$orderID";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();


?>
<section class="panel important">
    <h2>Update Payment <?php echo date("Y-m-d");?></h2>
    <form action="" method="POST">
        <div class="twothirds">
        <input type="hidden" name="PaymentID" id="PaymentID" value="<?php echo $row['PaymentID']; ?>" placeholder=""  required/>
        <input type="hidden" name="orderID" id="orderID" value="<?php echo $row['orderID']; ?>" placeholder="" />
            <label for="Amount">Amount</label>
            <input type="text" name="Amount" id="Amount" value="<?php echo $row['Amount']; ?>" placeholder="" required/>
            <label for="paymentStatus">Payment Status </label>
            <select name="paymentStatus" id="paymentStatus">
                <option value="<?php echo $row['paymentStatus']; ?>" ><?php echo $row['paymentStatus']; ?> </option>
                <option value="Paid">Paid</option>
                <option value="Pending">Pending</option>
            </select>
        <input type="hidden"  name="paymentDateTime" id="paymentDateTime" value="<?php echo $row['paymentDateTime']; ?>" placeholder="" hidden required/>

        </div>
        <div class="onethird">
            <div>
                <input type="submit" value="Update" />
            </div>
        </div>
    </form>
</section>

<?php
    }
}
    else {

    }
?>


<?php include("footer.php");?>

<?php 
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $paymentID = $_POST['PaymentID']; 
    $orderID = $_POST['orderID']; 
    $Amount = $_POST["Amount"];
    $paymentStatus = $_POST["paymentStatus"];
    $paymentDateTime = $_POST["paymentDateTime"];

    $sql = "UPDATE payment SET orderID='$orderID',Amount='$Amount', paymentStatus='$paymentStatus', paymentDateTime='$paymentDateTime' WHERE PaymentID=$paymentID";

    if ($conn->query($sql) === TRUE) {
        header("Location:view_order.php?orderID=".urlencode($_GET['orderID'])); // Redirect to the view page for the payment
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>



<?php include("footer.php");?>