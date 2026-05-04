<?php include("header.php");?>

<section class="panel important">
    <h2>Create New Customer</h2>
    <form action="create_customer.php" method="POST" >
        <div class="twothirds">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder=""  require/>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="" require/>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="" require/>
            <label for="customeraddress">Address</label>
            <input type="text" name="customeraddress" id="customeraddress" placeholder="" require/>

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

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $customeraddress = $_POST["customeraddress"];

    $sql = "INSERT INTO `Customers` (name, email, phone, customeraddress) VALUES ('$name', '$email', $phone,'$customeraddress')";

    if ($conn->query($sql) === TRUE) {
        header("Location: customers.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>