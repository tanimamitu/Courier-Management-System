<?php include('header.php') ?>

<?php

include 'config.php';

if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
    
    // Retrieve the order's data based on the ID
    $sql = "SELECT * FROM orders WHERE orderID=$orderID";
    $result = $conn->query($sql);

    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
    <?php 
        $customerid = $row['customerid'] ;
        $courierid = $row['courierid'] ;
        $orderID =$row['orderID'];
        //getting Customer data by order Id
        $getCustomer = "SELECT * FROM customers WHERE customerid=$customerid";
        $resultCustomer=$conn->query($getCustomer);
        //getting Courier data by order Id
        $getCourier = "SELECT * FROM couriers WHERE courierid=$courierid";
        $resultCourier=$conn->query($getCourier);
        //getting Tracking data by order Id
        $getTracking = "SELECT * FROM ordertracking WHERE orderID = '$orderID' ";
        $resultTracking = $conn->query($getTracking);
        //getting payment data by order Id
        $getPayment = "SELECT * FROM payment WHERE orderID = '$orderID' ";
        $resultPayment = $conn->query($getPayment);


    ?>
<section class="panel important">
<div id="printablearea">   

    <table >
        <tr><th> Order ID  </th> <th> <?php echo $row['orderID'] ?> </th> <td></td><td></td><td></td><td></td></tr>
        <tr><th> Tracking Code  </th> <th> <?php if ($resultTracking->num_rows == 1) { $Tracking = $resultTracking->fetch_assoc(); echo $Tracking['TrackingCode'];   } ?> </th> <td></td><td></td><td></td><td></td></tr>
        <tr><th> Delivery Date </th> <th> <?php echo $row['DeliveryDateTime'] ?></th><td></td><td></td><th> Payment Amount  </th> <th> ৳ <?php if ($resultPayment->num_rows == 1) { $payment = $resultPayment->fetch_assoc(); echo $payment['Amount'];    ?> Tk </th></tr>
        <tr><th> Pickup Date </th> <th><?php echo $row['PickupDateTime'] ?></th><td></td><td></td><th> Payment Status  </th> <th><?php echo $payment['paymentStatus']; } ?></th></tr>
        <tr><td>-</td><td></td><td></td><td>-</td><td></td><td>-</td></tr>
        <tr><th> Customer Name</th> <th>Courier Name </th> <th> DeliveryAddress </th> <th> PickupAddress </th> <th> Tracking Status</th> <th> Payment </th></tr>
        
        <tr>
            <td><?php if ($resultCustomer->num_rows == 1) { $Customer = $resultCustomer->fetch_assoc(); echo $Customer['name']; }   ?> </td>  
            <td><?php if ($resultCourier->num_rows == 1) { $courier = $resultCourier->fetch_assoc(); echo $courier['name']; }    ?> </td> <td> <?php echo $row['DeliveryAddress'] ?> </td> <td> <?php echo $row['PickupAddress'] ?></td>
            <td>
                <?php
                    if($resultTracking->num_rows < 1 ){ echo " <a href='active_tracking.php?orderID=". $row['orderID'] . "'> Active Tracking</a>";}
                    else{echo " <a href='update_tracking.php?orderID=". $row['orderID'] . "'>Update Tacking </a>";}            
                ?>        
            </td> 
            <td> 
               <?php 
                    if($resultPayment->num_rows < 1 ){ echo "  <a href='create_payment.php?orderID=". $row['orderID'] . "'> Add Payment</a>";}
                    else{echo " <a href='update_payment.php?orderID=". $row['orderID'] . "'>Update Payment</a>";}               
                  
               ?> 
            </td>
        </tr>    
        <table>
</div>
    <input type="button" id="printbtn" onclick="printDiv('printablearea')" value="Print Order Details!" />
    <?php 

    ?>
       
</section >

<?php
    } else {
        echo "User not found";
    }

} else {
    echo "No user ID specified";
}
?>
            <script>
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
            </script>

<?php include('footer.php') ?>