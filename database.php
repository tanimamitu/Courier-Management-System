<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'EcourierService'; // Change this to your desired database name

// Create a new mysqli instance
$mysqli = new mysqli($host, $username, $password);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Check if the database exists
$query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    // Database exists, connect to it
    $mysqli->select_db($database);
    echo "Connected to existing database '$database'.\n";
    // Now create your table
    $createTableQuery = " CREATE TABLE IF NOT EXISTS $database.users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) UNIQUE,
                email VARCHAR(255) UNIQUE,
                password VARCHAR(255),
                role ENUM('admin', 'user')

            )";
    if ($mysqli->query($createTableQuery)) {
        echo "Table users created successfully.\n";
    } else {
        echo "Error creating table: " . $mysqli->error . "\n";
    }
  //Create Customer Table
  $createCustomerQuery = " CREATE TABLE IF NOT EXISTS $database.customers (
              customerid INT AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(255) ,
              email VARCHAR(255),
              phone INT(20),
              customeraddress VARCHAR(500)
          )";
          if ($mysqli->query($createCustomerQuery)) {
              echo "Table customers created successfully.\n";
          }
          //Create Couriers Table
          $createCouriersQuery = " CREATE TABLE IF NOT EXISTS $database.couriers (
                      courierid INT AUTO_INCREMENT PRIMARY KEY,
                      name VARCHAR(255) ,
                      VehicleType VARCHAR(255),
                      LicensePlate VARCHAR(250),
                      availability int(20)
                  )";
                  if ($mysqli->query($createCouriersQuery)) {
                      echo "Table couriers created successfully.\n";
                  }
                  //Create Couriers Table
                  $createOrdersQuery = " CREATE TABLE IF NOT EXISTS $database.orders (
                              orderID INT AUTO_INCREMENT PRIMARY KEY,
                              customerid INT  ,
                              courierid INT ,
                              PickupAddress VARCHAR(350),
                              DeliveryAddress VARCHAR(350),
                              Status VARCHAR(250),
                              PickupDateTime DATE,
                              DeliveryDateTime DATE,
                              FOREIGN KEY(customerid) REFERENCES customers(customerID),
                              FOREIGN KEY(courierid) REFERENCES couriers(courierid)
                          )";
                          if ($mysqli->query($createOrdersQuery)) {
                              echo "Table Orders created successfully.\n";
                          }
                          //Create OrderTracking Table
                          $createOrderTrackingQuery = " CREATE TABLE IF NOT EXISTS $database.ordertracking (
                                      TrackingID  INT AUTO_INCREMENT PRIMARY KEY,
                                      orderID  int ,
                                      Status int(10),
                                      TrackingCode INT(15),
                                      Location VARCHAR(250),
                                      UpdateDateTime date,
                                      FOREIGN KEY(orderID) REFERENCES orders(orderID)
                                  )";
                                  if ($mysqli->query($createOrderTrackingQuery)) {
                                      echo "Table OrderTracking created successfully.\n";
                                  }
                                  //End OrderTracking Table
                                  //Create Payment Table
                                  $createPaymentQuery = " CREATE TABLE IF NOT EXISTS $database.payment (
                                              PaymentID  INT AUTO_INCREMENT PRIMARY KEY,
                                              orderID  int ,
                                              Amount VARCHAR(20),
                                              paymentStatus VARCHAR(20),
                                              paymentDateTime date,
                                              FOREIGN KEY(orderID) REFERENCES orders(orderID)
                                          )";
                                          if ($mysqli->query($createPaymentQuery)) {
                                              echo "Table Payment created successfully.\n";
                                          }
                                          //End Payment Table

} else {
    // Database doesn't exist, create it
    $createDbQuery = "CREATE DATABASE $database";
    if ($mysqli->query($createDbQuery)) {
        echo "Database '$database' created successfully.\n";
        // Now create your table
        $createTableQuery = " CREATE TABLE IF NOT EXISTS $database.users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(255) UNIQUE,
                    email VARCHAR(255) UNIQUE,
                    password VARCHAR(255),
                    role ENUM('admin', 'user')
                )";
        if ($mysqli->query($createTableQuery)) {
            echo "Table users created successfully.\n";
        } else {
            echo "Error creating table: " . $mysqli->error . "\n";
        }
        //Create Customer Table
        $createCustomerQuery = " CREATE TABLE IF NOT EXISTS $database.customers (
                    customerid INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) ,
                    email VARCHAR(255),
                    phone INT(20),
                    customeraddress VARCHAR(500)
                )";
                if ($mysqli->query($createCustomerQuery)) {
                    echo "Table customers created successfully.\n";
                }
    } else {
        echo "Error creating database: " . $mysqli->error . "\n";
    }
}

// Close the connection
$mysqli->close();
?>


<?php
//to create Admin
include('config.php');

$usernameToCheck = 'admin';
$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $usernameToCheck);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

}
else {
  $plainPassword = 'Admin123';
  $username = 'admin';
  $email = 'admin@gmail.com';
  $role = "admin";
  $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

  $query = $conn->prepare("INSERT INTO users (username,email, password, role) VALUES (?, ?, ?, ?)");
  $query->bind_param('ssss', $username ,$email, $hashedPassword, $role );
  if ($query->execute()) {
      echo "Query executed successfully.";
  }

}
$conn->close();

?>
