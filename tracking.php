<?php include("header.php");?>



<section class="panel important">
    <h2>Search Tracking Status By Tracking Code</h2>

</section>
<section class="panel important">
    <form action="" method="GET" >
        <div class="twothirds">
            <label for="TrackingCode">Input Tracking Code </label>
            <input type="text" name="TrackingCode" id="TrackingCode" placeholder=""  require/>
        </div>
        <div class="onethird">
            <div>
            <input type="submit" value="search" />
            </div>
        </div>
    </form>


</section>
<section class="panel important">
<?php
include 'config.php';
if(isset($_GET['TrackingCode'])) {
    $trackingcode = $_GET['TrackingCode'];

    // Prepare SQL query
    $stmt = $conn->prepare("SELECT Status   FROM ordertracking WHERE TrackingCode = ?");
    $stmt->bind_param("i", $trackingcode);
    $stmt->execute();
    $stmt->bind_result($Status);
    $stmt->fetch();
    $stmt->close();
  // Display order status
  if(isset($Status)) {
    echo $Status;
    } else {
        echo "Order not found.";
    }

}

?>   

</section>

<?php include("footer.php");?>

