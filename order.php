<?php include("header.php");?>
<section class="panel important">
<h2><a href="create_order.php" class="link-button"> Create Order</a></h2>   
</section>  

<?php
  include 'config.php';
  $sql = "SELECT * FROM orders";
  $result = $conn->query($sql);

?>

<section class="panel important">
    <h2>Table</h2>
    <table>
      <tr>
        <th>Id</th>
        <th>customerid</th>
        <th>courierid</th>
        <th>PickupAddress</th>
        <th>DeliveryAddress</th>
        <th>PickupDate</th>
        <th>DeliveryDate</th>
        <th>Tracking</th>
        <th>Action</th>
      </tr>
      <?php
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $orderID =$row['orderID'];
                    $getTracking = "SELECT * FROM ordertracking WHERE orderID = '$orderID' ";
                    $resultTracking = $conn->query($getTracking);
                    
                    echo "<tr>";                   
                    echo "<td>" . $row['orderID'] . "</td>";
                    echo "<td>" . $row['customerid'] . "</td>";
                    echo "<td>" . $row['courierid'] . "</td>";
                    echo "<td>" . $row['PickupAddress'] . "</td>";
                    echo "<td>" . $row['DeliveryAddress'] . "</td>";
                    echo "<td>" . $row['PickupDateTime'] . "</td>";
                    echo "<td>" . $row['DeliveryDateTime'] . "</td>";
                    if($resultTracking->num_rows < 1 ){ echo "<td>  <a href='active_tracking.php?orderID=". $row['orderID'] . "'> Active Tracking</a></td>";}
                     else{echo "<td> <a href='update_tracking.php?orderID=". $row['orderID'] . "'>Update Tacking </a></td>";}
                    echo "<td><a href='view_order.php?orderID=". $row['orderID'] . "'>View</a> |<a href='update_order.php?orderID=". $row['orderID'] . "'>Edit</a> |<a href='delete_order.php?orderID=". $row['orderID'] . " '>Delete</a> </td>";
                    echo "</tr>";
                  }
                  } else {
                    echo "<tr><td colspan='5'>No users found.</td></tr>";
                  }

                 ?>
    </table>
  </section>







<?php include("footer.php");?>
