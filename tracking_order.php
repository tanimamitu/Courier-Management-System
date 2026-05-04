<?php include('front_header.php') ?>  

    <div class="customercontainer">
        <h2>Tracking Your Order by Tracking Code </h2>
        <form method="post" action="tracking_order.php">
            <input type="text" name="TrackingCode" placeholder="Tracking Code" required>
            <button type="submit">Get Status </button>
        </form>
    </div>
    <div class="customercontainer bt">
            <?php
            include 'config.php';
                // Fetching customer details
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $TrackingCode = $_POST['TrackingCode'];
                    
                    $sql = "SELECT * FROM ordertracking WHERE TrackingCode = $TrackingCode";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        $orderID =$row['orderID'];
                        // Retrieve the order's data based on the ID
                        $Order = "SELECT * FROM orders WHERE orderID=$orderID";
                        $resultOrder = $conn->query($Order);
                    ?>

                     <table>
                     <tr><th> Order Status </th> 
                        <td>
                        <?php 
                                if($row['Status'] == 1){
                                    echo"Confirm";
                                    }
                                    elseif( $row['Status'] == 2){
                                        echo"pickup";
                                    }
                                    elseif( $row['Status'] == 3){
                                        echo"In Transit";
                                    }
                                    elseif( $row['Status'] == 4){
                                        echo"Delivered";
                                    }                       
                            ?>
                        </td>
                    </tr>

                        <tr><th> PickupAddress </th>  <td><?php if ($resultOrder->num_rows == 1) { $order = $resultOrder->fetch_assoc(); echo $order['PickupAddress'];   ?></td>  </tr>
                        <tr> <th> DeliveryAddress </th> <td> <?php echo $order['DeliveryAddress'];?></td></tr>
                        <tr><th> DeliveryDateTime </th> <td> <?php echo $order['DeliveryDateTime']; ?> </td></tr>
                        <?php 
                            $customerid = $order['customerid'] ;
                            $courierid = $order['courierid'] ;
                            $OrderID =$order['orderID'];
                            //getting Customer data by order Id
                            $getCustomer = "SELECT * FROM customers WHERE customerid=$customerid";
                            $resultCustomer=$conn->query($getCustomer);
                            //getting Courier data by order Id
                            $getCourier = "SELECT * FROM couriers WHERE courierid=$courierid";
                            $resultCourier=$conn->query($getCourier);
                            //getting Tracking data by order Id  
                            //getting payment data by order Id
                            $getPayment = "SELECT * FROM payment WHERE orderID = '$OrderID' ";
                            $resultPayment = $conn->query($getPayment);                     
                        ?>
                        <tr><th> Customer name</th> <td><?php if ($resultCustomer->num_rows == 1) { $customer = $resultCustomer->fetch_assoc(); echo $customer['name'];   }?></td></tr>
                        <tr><th> Courier Name</th> <td><?php if ($resultCourier->num_rows == 1) { $Courier = $resultCourier->fetch_assoc(); echo $Courier['name'];   }?></td> </tr>
                        <tr><th> Payment Amount </th> <td><?php if ($resultPayment->num_rows == 1) { $Payment = $resultPayment->fetch_assoc(); echo $Payment['Amount'];   }?></td> </tr> 

                         <?php } //End order Data ?>       
                    </tr>
                     </table>       





        <?php
                    } else {
                        echo "No Order Status found with Code: $TrackingCode";
                    }
                    
                    mysqli_close($conn);
                }

        ?>
    </div>

<?php include('front_footer.php') ?>  
