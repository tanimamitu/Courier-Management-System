<?php include('header.php') ?>

<?php

include 'config.php';

if (isset($_GET['customerid'])) {
    $customerid = $_GET['customerid'];
    
    // Retrieve the user's data based on the ID
    $sql = "SELECT * FROM customers WHERE customerid=$customerid";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
    <section class="panel important">
        <h2>Update <?php echo $row['name']; ?></h2>
        <form action="update_customer.php" method="POST" >
            <div class="twothirds">

                <input type="hidden" name="customerid" value="<?php echo $row['customerid']; ?>">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="" value="<?php echo $row['name']; ?>" require/>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="" value="<?php echo $row['email']; ?>" require/>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="" value="<?php echo $row['phone']; ?>"require/>
                <label for="customeraddress">Address</label>
                <input type="text" name="customeraddress" id="customeraddress" value="<?php echo $row['customeraddress']; ?>" placeholder="" require/>

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
<?php include('footer.php') ?>


<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["customerid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $customeraddress = $_POST["customeraddress"];

    $sql = "UPDATE `Customers` SET name='$name', email='$email', phone='$phone', customeraddress='$customeraddress' WHERE customerid=$id ";

    if ($conn->query($sql) === TRUE) {
        header("Location: customers.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>