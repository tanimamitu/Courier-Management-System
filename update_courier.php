<?php include('header.php') ?>
<?php

include 'config.php';

if (isset($_GET['courierid'])) {
    $courierid = $_GET['courierid'];
    
    // Retrieve the user's data based on the ID
    $sql = "SELECT * FROM couriers WHERE courierid=$courierid";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    ?>
    <section class="panel important">
        <h2>Update <?php echo $row['name']; ?></h2>
        <form action="update_courier.php" method="POST" >
            <div class="twothirds">

                <input type="hidden" name="courierid" value="<?php echo $row['courierid']; ?>">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="" value="<?php echo $row['name']; ?>" require/>
                <label for="email">VehicleType</label>
                <input type="text" name="VehicleType" id="VehicleType" placeholder="" value="<?php echo $row['VehicleType']; ?>" require/>
                <label for="phone">LicensePlate</label>
                <input type="text" name="LicensePlate" id="LicensePlate" placeholder="" value="<?php echo $row['LicensePlate']; ?>"require/>
                <label for="customeraddress">Availability</label>
                <input type="text" name="availability" id="availability" value="<?php echo $row['availability']; ?>"  require/>

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


<?php include("footer.php");?>

<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["courierid"];
    $name = $_POST["name"];
    $VehicleType = $_POST["VehicleType"];
    $LicensePlate = $_POST["LicensePlate"];
    $availability = $_POST["availability"];

    $sql = "UPDATE `couriers` SET name='$name', VehicleType='$VehicleType', LicensePlate='$LicensePlate', availability=$availability WHERE courierid=$id ";

    if ($conn->query($sql) === TRUE) {
        header("Location: courier.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>