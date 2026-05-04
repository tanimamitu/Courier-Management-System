<?php include("header.php");?>



<section class="panel important">
    <h2>Create New Courier</h2>
    <form action="create_courier.php" method="POST" >
        <div class="twothirds">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder=""  require/>
            <label for="VehicleType">VehicleType</label>
            <input type="text" name="VehicleType" id="VehicleType" placeholder="" require/>
            <label for="LicensePlate">LicensePlate</label>
            <input type="text" name="LicensePlate" id="LicensePlate" placeholder="" require/>
            <label for="availability">Select Availability</label>
            <select name="availability" id="availability">
            <option value="1">Available</option>
            <option value="2">Full</option>
            </select>
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
    $VehicleType = $_POST["VehicleType"];
    $LicensePlate = $_POST["LicensePlate"];
    $availability = $_POST["availability"];

    $sql = "INSERT INTO couriers (name, VehicleType, LicensePlate, availability) VALUES ('$name', '$VehicleType', '$LicensePlate',$availability)";

    if ($conn->query($sql) === TRUE) {
        header("Location: courier.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();


?>