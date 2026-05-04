<?php include('header.php') ?>

<?php

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve the user's data based on the ID
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
    ?>
    <section class="panel important">
        <h2>Update <?php echo $row['username']; ?></h2>
        <form action="update_user.php" method="POST" >
            <div class="twothirds">

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">User Name</label>
                <input type="text" name="username" id="username" placeholder="" value="<?php echo $row['username']; ?>" require/>
                <label for="password">password</label>
                <input type="password" name="password" id="password" placeholder="" value="<?php echo $row['password']; ?>"require/>

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
    $id=$_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // If the user wants to update the password
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET  username = ?,  password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username,  $hashed_password, $id);
    } else {
        // If the user does not want to update the password
        $stmt = $conn->prepare("UPDATE users SET  username = ?, WHERE id = ?");
        $stmt->bind_param("si", $username, $id);
    }

    if ($stmt->execute()) {
        // If the update was successful, update the session username
        header("Location: users.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>