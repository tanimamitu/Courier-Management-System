<?php include("header.php");?>

<?php
  include 'config.php';
  $sql = "SELECT * FROM customers";
  $result = $conn->query($sql);

?>
<section class="panel important panel-flax">
<h2 > <a href="create_customer.php" class="link-button"> Add Customer</a> </h2>
</section>  

<section class="panel important">
    <h2>List of All Customer</h2>
    <form method="post" action="customers.php" class="">
        <input class="searchText" type="text" name="query" placeholder="Enter your search query">
        <button type="submit"></button>
    </form>
    <?php
  // Initialize variables
    $search_query = "";
    $results_found = false;

    // Handle search query
    if(isset($_POST['query'])) {
        $search_query = $_POST['query'];

        // SQL query to search
        $sql = "SELECT * FROM customers WHERE customerid LIKE '%$search_query%' OR name LIKE '%$search_query%'   ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display results in a table
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>";

            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['customerid'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['phone'] . "</td>";
              echo "<td><a href='update_customer.php?customerid=" . $row['customerid'] . "'>Edit</a> | <a href='delete_customer.php?customerid=" . $row['customerid'] . "'>Delete</a></td>";
              echo "</tr>";
            }

            echo "</table>";
            $results_found = true;
        }
    }

    // If no search made or no results found, show normal data
    if (!$results_found) {
        echo "<h2>Normal Data</h2>";
        // Display normal data from the database
        $sql_normal = "SELECT * FROM customers";
        $result_normal = $conn->query($sql_normal);

        if ($result_normal->num_rows > 0) {
            echo "<table>";
            echo "<tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>";

            while($row = $result_normal->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['customerid'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['phone'] . "</td>";
              echo "<td><a href='update_customer.php?customerid=" . $row['customerid'] . "'>Edit</a> | <a href='delete_customer.php?customerid=" . $row['customerid'] . "'>Delete</a></td>";
              echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data found";
        }
    }

    $conn->close();
    ?>






    </table>
  </section>


<?php include("footer.php");?>