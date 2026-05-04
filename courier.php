<?php include("header.php");?>

<section class="panel important panel-flax">
<h2 > <a href="create_courier.php" class="link-button"> Add Courier</a> </h2>
</section>  

<?php
  include 'config.php';
  $sql = "SELECT * FROM couriers";
  $result = $conn->query($sql);

?>

<section class="panel important">
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>VehicleType</th>
        <th>LicensePlate</th>
        <th>Availability</th>
        <th>Action</th>
      </tr>
      <?php
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    $availability = $row['availability'] == 1 ? 'Available':'Full';
                    echo "<td>" . $row['courierid'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['VehicleType'] . "</td>";
                    echo "<td>" . $row['LicensePlate'] . "</td>";
                    echo "<td>" . $availability. "</td>";
                    echo "<td><a href='update_courier.php?courierid=" . $row['courierid'] . "'>Edit</a> | <a href='delete_courier.php?courierid=" . $row['courierid'] . "'>Delete</a></td>";
                    echo "</tr>";
                  }
                  } else {
                    echo "<tr><td colspan='5'>No users found.</td></tr>";
                  }

                 ?>
    </table>
  </section>


<?php include("footer.php");?>
