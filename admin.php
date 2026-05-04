<?php
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
  $username = 'tanima';
  $email = 'tanima@gmail.com';
  $role = "admin";
  $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

  $query = $conn->prepare("INSERT INTO users (username,email, password, role) VALUES (?, ?, ?, ?)");
  $query->bind_param('ssss', $username ,$email, $hashedPassword, $role );
  if ($query->execute()) {
      echo "admin Query executed successfully.";
  }

}
$conn->close();

?>