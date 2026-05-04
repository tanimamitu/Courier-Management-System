<?php include('front_header.php') ?>  

    <div class="customercontainer">
        <h2>Enter Customer ID </h2>
        <form method="post" action="customer_details.php">
            <input type="text" name="customerid" placeholder="Customer ID" required>
            <button type="submit">Get Details</button>
        </form>
    </div>
    <div class="customercontainer bt">
            <?php
            include 'config.php';
                // Fetching customer details
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $customerid = $_POST['customerid'];
                    
                    $sql = "SELECT * FROM customers WHERE customerid = $customerid";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo "Customer ID: " . $row['customerid'] . "<br>";
                        echo "Name: " . $row['name'] . "<br>";
                        echo "Email: " . $row['email'] . "<br>";
                        echo "Phone: " . $row['phone'] . "<br>";
                    } else {
                        echo "No customer found with ID: $customer_id";
                    }
                    
                    mysqli_close($conn);
                }

        ?>
    </div>

<?php include('front_footer.php') ?>  